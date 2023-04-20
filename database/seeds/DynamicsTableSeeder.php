<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DynamicsTableSeeder extends Seeder
{
    protected $settings = [
    	/*[
    		'widget' => 'populer',
            'name' => 'Kolom-1',
	    	'title' => 'Artikel Teratas',
	    	'position' => 'homepage',
	    	'extras' => '{"berdasarkan":"all_time_stats","number":4}',
    	],
    	[
            'widget' => 'recent',
    		'name' => 'Kolom-2',
	    	'title' => 'Artikel Terbaru',
	    	'position' => 'homepage',
	    	'extras' => '{"number":4}',
    	],
    	[
            'widget' => 'image',
    		'name' => 'Kolom-3',
	    	'title' => 'Kepala BPKAD Nunukan',
	    	'position' => 'homepage',
	    	'extras' => '{"image":"uploads\\Kadis.png","url":"http:\/\/samarindaweb.com"}',
    	],
    	[
            'widget' => 'video',
    		'name' => 'Kolom-4',
	    	'title' => 'Video Spesial',
	    	'position' => 'homepage',
	    	'extras' => '{"video":"<iframe width=\"560\" height=\"315\" src=\"https:\/\/www.youtube.com\/embed\/Xm7sPH4oIDs?rel=0&amp;showinfo=0\" frameborder=\"0\" allowfullscreen></iframe>"}',
    	],
    	[
            'widget' => 'gallery',
    		'name' => 'Kolom-5',
	    	'title' => 'Galeri Foto',
	    	'position' => 'homepage',
    	],
    	[
            'widget' => 'populer',
    		'name' => 'Kolom-1',
	    	'title' => 'Artikel Teratas',
	    	'position' => 'sidebar',
	    	'extras' => '{"berdasarkan":["all_time_stats"],"number":4}',
    	],
    	[
            'widget' => 'categories',
    		'name' => 'Kolom-2',
	    	'title' => 'Berdasarkan Topik',
	    	'position' => 'sidebar',
	    	'extras' => '{"category":"semua"}',
    	],
    	[
            'widget' => 'recent',
    		'name' => 'Kolom-3',
	    	'title' => 'Artikel Terbaru',
	    	'position' => 'sidebar',
	    	'extras' => '{"number":4}',
    	],
    	[
            'widget' => 'video',
    		'name' => 'Kolom-4',
	    	'title' => 'Video Spesial',
	    	'position' => 'sidebar',
	    	'extras' => '{"video":"<iframe width=\"560\" height=\"315\" src=\"https:\/\/www.youtube.com\/embed\/Xm7sPH4oIDs?rel=0&amp;showinfo=0\" frameborder=\"0\" allowfullscreen></iframe>"}',
    	],
    	[
            'widget' => 'address',
    		'name' => 'Kolom-1',
	    	'title' => 'Address',
	    	'position' => 'footer',
	    	'extras' => '{"address":"Kabupaten Nunukan","province:Kalimantan Utara","phone":"(0556) 00000","email":"admin.bpkadnunukan@gmail.com","map":"<iframe src=\"https:\/\/www.google.com\/maps\/embed?pb=!1m18!1m12!1m3!1d13386.107016076634!2d117.71382479200176!3d4.078670787802514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3215badf5ab8b037%3A0xceb2490a60532e7e!2sKantor+Bupati+Nunukan!5e0!3m2!1sid!2sid!4v1507964915121\" width=\"400\" height=\"300\" frameborder=\"0\" style=\"border:0\" allowfullscreen><\/iframe>"}',
    	],
    	[
            'widget' => 'images',
    		'name' => 'Kolom-2',
	    	'title' => 'Support',
	    	'position' => 'footer',
	    	'extras' => '{"image_1":"uploads\\web\\lapor.png","url_1":"http:\/\/bpkadnunukan.org\/contact.html","image_2":"uploads\\web\\pemkab.jpg","url_2":"http:\/\/www.nunukankab.go.id\/","image_3":"uploads\\web\\lpse_nunukan.png","url_3":"http:\/\/lpse.nunukankab.go.id\/eproc\/"}',
    	],
    	[
            'widget' => 'image',
    		'name' => 'Kolom-3',
	    	'title' => 'Download My Trip My Document App',
	    	'position' => 'footer',
	    	'extras' => '{"image":"uploads\\web\\gambar-download-app.png","url":"https:\/\/play.google.com\/store\/apps\/details?id=pimenlabs.web.id.mtmdnunukan"}',
    	],*/
        [
            'widget' => 'text',
            'name' => 'Kolom-1',
            'title' => 'Address',
            'position' => 'footer',
            'extras' => '{"text":""}',
        ],
        [
            'widget' => 'text',
            'name' => 'Kolom-2',
            'title' => 'Contact Us',
            'position' => 'footer',
            'extras' => '{"text":""}',
        ],
        [
            'widget' => 'social',
            'name' => 'Kolom-3',
            'title' => 'Follow Us',
            'position' => 'footer',
        ],
        [
            'widget' => 'homelink',
            'name' => 'Kolom-1',
            'title' => 'Special Promo',
            'position' => 'homepage',
        ],
        [
            'widget' => 'homelink',
            'name' => 'Kolom-2',
            'title' => 'Order Now',
            'position' => 'homepage',
        ],
        [
            'widget' => 'homelink',
            'name' => 'Kolom-3',
            'title' => 'Brocure Download',
            'position' => 'homepage',
        ],
        [
            'widget' => 'topmenu',
            'name' => 'Kolom-1',
            'title' => 'Top Menu Satu',
            'position' => 'topmenu',
        ],
        [
            'widget' => 'topmenu',
            'name' => 'Kolom-2',
            'title' => 'Top Menu Dua',
            'position' => 'topmenu',
        ],
        [
            'widget' => 'topmenu',
            'name' => 'Kolom-3',
            'title' => 'Top Menu Tiga',
            'position' => 'topmenu',
        ],
    	
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting) {
            $result = DB::table('dynamics')->insert($setting);

            if (!$result) {
                $this->command->info("Insert failed at record $index.");

                return;
            }
        }

        $this->command->info('Inserted '.count($this->settings).' records.');
    }
}
