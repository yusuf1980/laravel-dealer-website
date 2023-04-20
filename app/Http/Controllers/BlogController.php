<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use DB;

class BlogController extends Controller
{
    public function index()
    {
    	$data = array();
    	$data['berita'] = Article::with('user')->orderBy('date', 'desc')->orderBy('id','desc')->paginate(8);

    	return view('front.news.index', $data);
    }

    public function category($slug)
    {
    	$data = array();
        $data['item'] = Category::where('slug', $slug)->first();
        if(empty($data['item'])) {
            abort(404);
        }
    	$data['berita'] = Article::with('user')->whereHas('category', function($q) use ($slug) {
    		$q->where('slug', $slug);
    	})->orderBy('date', 'desc')->orderBy('id','desc')->paginate(8);
        $data['category'] = 'category';

    	return view('front.news.index', $data);
    }

    public function tag($slug)
    {
    	$data = array();
        $data['item'] = Tag::where('slug', $slug)->first();
        if(empty($data['item'])) {
            abort(404);
        }
    	$data['berita'] = Article::whereHas('tags', function($q) use ($slug) {
    		$q->where('slug', $slug);
    	})->orderBy('date', 'desc')->orderBy('id','desc')->paginate(8);

        $data['tags'] = 'tags';

    	return view('front.news.index', $data);
    }

    public function show($slug)
    {
    	$data = array();
    	$data['article'] = Article::with('tags')->where('slug', $slug)->first();
    	if(empty($data['article'])) abort(404);
        $data['article']->hit();
    	
    	$name = str_replace('"', '',$data['article']->title);
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

        //$data['articles'] = Article::where('title', 'LIKE', '%'.$data['article']->title)->take(6)->get();

        $data['articles'] = Article::where('id','!=', $data['article']->id)
            ->where(function ($q) use ($merge) {
                for($i=0;$i<=count($merge)-1;$i++){
                     $q->orWhere('title', 'LIKE', '%'.$merge[$i].'%');
                }
            })
            ->orderBy(DB::raw($case))->orderBy('updated_at', 'desc')
            ->take(6)->get();

    	return view('front.news.show', $data);
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


}
