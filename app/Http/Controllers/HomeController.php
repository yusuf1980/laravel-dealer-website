<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Stat;
use App\Functions\Popularity;
use App\Traits\WidgetsTrait;
use App\Models\GalleryFoto;
use App\Models\Page;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;
use App\Models\Product;
use DB;
use Alert;
use Alerts;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Response;

class HomeController extends Controller
{
    use WidgetsTrait;

    public function index()
    {
        $data = array();
        $data['sliders'] = Slider::orderBy('id', 'desc')->where('status', 'PUBLISHED')->take(5)->get();

        $data['image_1'] = $this->widget('homepage','kolom-1');
        $data['image_2'] = $this->widget('homepage','kolom-2');
        $data['image_3'] = $this->widget('homepage','kolom-3');

        return view('front.home', $data);
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if (empty($page) ) {
            abort(404);
        }
        $this->data['page'] = $page->withFakes();

        return view('front.page', $this->data)->withHeaders('X-Frame-Options', 'ALLOWALL');
    }

    /*

    public function album($slug)
    {
        $this->data['photo'] = GalleryFoto::where('slug', $slug)->first();
        if (empty($this->data['photo'])) {
            abort(404);
        }

        return view('front.photo', $this->data);
    }*/

    public function test()
    {
        $data = array();
        
        //$popularity = new Popularity;
        //$data['populer'] = $popularity->getStats('one_day_stats','DESC','App\Models\Article',4)->get();

        /*$data['articles'] = Article::whereHas('stats', function($q) {
            $q->where('one_day_stats', '!=', 0 );
        })->get();*/

        $days = 'one_day_stats';
        $limit = 2;

        $data['articles'] = Article::select('articles.*')
            ->leftjoin('stats', 'stats.trackable_id', '=', 'articles.id')
            ->where('stats.'.$days, '!=', 0)
            ->orderBy('.stats.'.$days, 'desc')
            ->limit($limit)
            ->get();


        return view('front.test', $data);
    }

    public function search(Request $request)
    {

        $this->validate($request, [
            's' => 'required|min:3|max:150'
        ]);
        $data = array();

        /*$data['page'] = Page::where('slug', $slug)->first();
        if (empty($data['page']) ) {
            abort(404);
        }
        $data['page'] = $data['page']->withFakes();
        
        if($data['page']->template != 'berita') {
            abort(404);
        }*/
        
        $s = $request->input('s');
        $search = strip_tags(trim($s));
        //$search = str_replace('-', ' ', $search);

        //$highlight = explode(' ', $search);

        //$post = Post::with('user')->whereRaw('MATCH(title,description) AGAINST(? IN BOOLEAN MODE)', array($search))->paginate(10);
        //$data['article'] = Article::with('user')->whereRaw('MATCH(title,content) AGAINST(? IN BOOLEAN MODE)', array($search))->paginate(8);
        $name = str_replace('"', '',$search);
        $merge = $this->getPerwords($name);
        $coun = count($merge);

        $case = 'case when title like "%'.$merge[0].'%" then 0 '; 
        if($coun > 1 ) {
            $case .= 'when title like "%'.$merge[1].'%" then 1 ';
            $case .= 'when title like "%'.$merge[2].'%" then 2 ';
        }
        if($coun > 5) {
            $case .= 'when title like "%'.$merge[3].'%" then 3 '; 
        }  
        $case .= 'else 1 end';

        $data['articles'] = Article::with('user')
            ->where(function ($q) use ($merge) {
                for($i=0;$i<=count($merge)-1;$i++){
                     $q->orWhere('title', 'LIKE', '%'.$merge[$i].'%');
                }
            })
            ->orderBy(DB::raw($case))->orderBy('updated_at', 'desc')
            ->paginate(8);

        $data['articles']->setPath('cari');
        $data['search'] = $search;

        return view('front.search', $data);
    }

    private function getPerwords($data)
    {
        $p_pisah = explode(' ', $data);

        $tech1 = $p_pisah;
        $def = count($tech1);
        $def -= 2;
        
        //Dimulai ambil semua bagian, dikurangi tiap kata terakhir
        $t1 = [];
        for($i=0; $i <= $def; $i++) {
            $ver = [];
            // Ambil tiap kata ke dalam array
            foreach($tech1 as $p) {
                $ver[] = $p;
            }
            // Kurangi array terakhir
            array_pop($tech1);
            // Simpan ke dalam array
            $t1[] = $ver;
        }
        //Semua, tetapi dimulai dari kata kedua - akhir 
        //dikurangi tiap kata dari depan
        $tech2 = $p_pisah;
        $def2 = count($tech2);
        $def2 -= 3;
        
        $t2 = [];
        for($i=0;$i<= $def2 ;$i++){
            $vor = [];
            foreach(array_slice($tech2, 1,count($tech2) - 1 ) as $p) {
                $vor[] = $p;
            }
            array_shift($tech2);
            $t2[] = $vor;
        }
        $implod1 = [];
        foreach($t1 as $p) { $implod1[] = implode(' ', $p); }
        $implod2 = [];
        foreach($t2 as $p) { $implod2[] = implode(' ', $p); }

        $techMerge = array_merge($implod1, $implod2);
        $merge = array_merge($techMerge, $p_pisah);

        return $merge;
    }

    public function getContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:150',
            'email' => 'required|email',
            //'telp' => 'numeric',
            //'judul' => 'required|min:3|max:150',
            'description' => 'required|min:20|max:2000',
            'slug' => 'required'
        ]);
        //dd($request->all());

        $input['name'] = htmlentities(strip_tags(trim($request->input('name'))));
        $input['email'] = htmlentities(strip_tags(trim($request->input('email'))));
        $input['website'] = htmlentities(strip_tags(trim($request->input('website'))));
        //$input['title'] = htmlentities(strip_tags(trim($request->input('judul'))));
        $input['description'] = htmlentities(trim($request->input('description')));
        $input['slug'] = htmlentities(trim($request->input('slug')));
        //$input['status'] = 1;

        $desc = $input['description'];

        /* Untuk Kirim Email hasil dari contact form*/
        $output['messageLines'] = explode("\n", $input['description']);
        //$set = Setting::where('key', 'terima-email')->first();
        //$penmail = unserialize($set->value);
        $slug = 
        $page = Page::where('slug', $input['slug'])->first();
        if (empty($page) ) {
            abort(404);
        }
        $page = $page->withFakes();
        $penmail = $page->email;

        if(empty($penmail)) {
            $penmail = Setting::where('key', 'contact_email')->first();
            $penmail = $penmail->value;
        }
        if(empty($penmail)) {
            $penmail = 'yugojiro@gmail.com';
        }

        $data = array(
                'name' => $input['name'],
                'email' => $input['email'],
                'website' => $input['website'],
                'messageLines' => $output['messageLines']
            );

        //Contact::create($input);
        
        Mail::send('emails.contact', $data, function ($message) use ($data, $penmail){
            $message->from('no-reply@hondaamartha.com', 'Honda Amartha');
            $message->subject('Ada Pesan dari: ' . $data['name'])
                ->to($penmail);
        });

        //flash()->success('Terima kasih, Pesan Anda telah terkirim.');
        Alert::success('Terima kasih, Pesan Anda telah terkirim.')->flash();

        return Redirect::back();
    }

    public function getOrder(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3|max:150',
            'telepon' => 'required|numeric',
            'email' => 'required|email',
            'deskripsi' => 'required|min:20|max:2000',
            'slug' => 'required'
        ]);

        $input['name'] = htmlentities(strip_tags(trim($request->input('nama'))));
        $input['email'] = htmlentities(strip_tags(trim($request->input('email'))));
        $input['telepon'] = htmlentities(strip_tags(trim($request->input('telepon'))));
        $input['description'] = htmlentities(trim($request->input('deskripsi')));
        $input['slug'] = htmlentities(trim($request->input('slug')));

        /* Untuk Kirim Email hasil dari contact form*/
        $output['messageLines'] = explode("\n", $input['description']);
        
        $page = Page::where('slug', $input['slug'])->first();
        if (empty($page) ) {
            abort(404);
        }
        $page = $page->withFakes();
        $penmail = $page->email;

        if(empty($penmail)) {
            $penmail = Setting::where('key', 'contact_email')->first();
            $penmail = $penmail->value;
        }
        if(empty($penmail)) {
            $penmail = 'yugojiro@gmail.com';
        }

        $data = array(
                'name' => $input['name'],
                'email' => $input['email'],
                'telepon' => $input['telepon'],
                'messageLines' => $output['messageLines']
            );

        //Contact::create($input);
        
        Mail::send('emails.contact', $data, function ($message) use ($data, $penmail){
            $message->from('no-reply@hondaamartha.com', 'Honda Amartha');
            $message->subject('Ada Pesan/Order dari: ' . $data['name'])
                ->to($penmail);
        });

        
        Alert::success('Terima kasih, Order Mobil Honda Anda telah terkirim, kami akan segera telepon balik.')->flash();
        //Alerts::success('Pesan anda telah terkirim', 'Terima Kasih '.$input['name'])->persistent('Close');

        return Redirect::back();
    }

    public function getBooking(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:3|max:150',
            'telepon' => 'required|numeric',
            'email' => 'required|email',
            'tipe' => 'required',
            'stnk' => '',
            'nopol' => '',
            'tanggal_service' => 'required',
            'deskripsi' => 'max:2000',
            'slug' => 'required'
        ]);

        $input['name'] = htmlentities(strip_tags(trim($request->input('nama'))));
        $input['email'] = htmlentities(strip_tags(trim($request->input('email'))));
        $input['mail_pen'] = htmlentities(strip_tags(trim($request->input('mail_pen'))));
        $input['telepon'] = htmlentities(strip_tags(trim($request->input('telepon'))));
        $input['description'] = htmlentities(trim($request->input('deskripsi')));
        $input['tipe'] = htmlentities(trim($request->input('tipe')));
        $input['stnk'] = htmlentities(trim($request->input('stnk')));
        $input['nopol'] = htmlentities(trim($request->input('nopol')));
        $input['tanggal_service'] = htmlentities(trim($request->input('tanggal_service')));
        $input['slug'] = htmlentities(trim($request->input('slug')));

        /* Untuk Kirim Email hasil dari contact form*/
        $output['messageLines'] = explode("\n", $input['description']);
        
        $page = Page::where('slug', $input['slug'])->first();
        if (empty($page) ) {
            abort(404);
        }
        $page = $page->withFakes();
        $penmail = $page->email;

        if(empty($penmail)) {
            //$penmail = Setting::where('key', 'contact_email')->first();
            $penmail = $input['mail_pen'];
            //$penmail = $penmail->value;
        }
        if(empty($penmail)) {
            $penmail = 'yugojiro@gmail.com';
        }

        $data = array(
                'name'            => $input['name'],
                'email'           => $input['email'],
                'telepon'         => $input['telepon'],
                'tipe'            => $input['tipe'],
                'stnk'            => $input['stnk'],
                'nopol'           => $input['nopol'],
                'tanggal_service' => $input['tanggal_service'],
                'messageLines'    => $output['messageLines']
            );

        //Contact::create($input);
        
        Mail::send('emails.booking', $data, function ($message) use ($data, $penmail){
            $message->from('no-reply@hondaamartha.com', 'Honda Amartha');
            $message->subject('Booking Service dari: ' . $data['name'])
                ->to($penmail);
        });

        
        Alert::success('Terima kasih, Booking Service Mobil Honda Anda telah terkirim.')->flash();

        return Redirect::back();
    }

    public function product($slug)
    {
        $data = array();
        $data['product'] = Product::whereSlug($slug)->first();
        $data['product'] = $data['product']->withFakes();

        return view('front.products.show', $data);
    }
    
    public function sendContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3|max:150',
            'telepon' => 'required|numeric',
        ]);

        $input['nama'] = htmlentities(strip_tags(trim($request->input('nama'))));
        $input['telepon'] = htmlentities(strip_tags(trim($request->input('telepon'))));
        $input['mobil'] = htmlentities(strip_tags(trim($request->input('mobil'))));
        //$input = $request->all();

        if ($validator->passes()) {

            // Store your user in database 
            $penmail = Setting::where('key', 'contact_email')->first();
            $penmail = $penmail->value;
            
            if(empty($penmail)) {
                $penmail = 'yugojiro@gmail.com';
            }

            $data = array(
                    'nama' => $input['nama'],
                    'telepon' => $input['telepon'],
                    'mobil' => $input['mobil'],
                );

            //Contact::create($input);
            
            Mail::send('emails.popup', $data, function ($message) use ($data, $penmail){
                $message->from('no-reply@hondaamartha.com', 'Honda Amartha');
                $message->subject('Ada Pesan Popup dari: ' . $data['nama'])
                    ->to($penmail);
            });

            return Response::json(['success' => '1', 'name'=>$input['nama']]);

        }

        //Alerts::success('Kami akan segera menghubungi Anda.', 'Terima Kasih '.$input['name'])->persistent('Close');

        return Response::json(['errors' => $validator->errors()]);
    }


}
