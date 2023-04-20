<?php

namespace App;

trait Widgets
{
	private function text()
	{
		$this->crud->addField([    // WYSIWYG
			'name'        => 'content',
			'label'       => 'Konten',
			'type'        => 'ckeditor',
			'placeholder' => 'Teks di sini',
			'fake'        => true,
			'store_in'    => 'extras',
        ]);
		
	}

	private function homelink()
	{
		$this->crud->addField([    // Image
			'name'     => 'image',
			'label'    => 'Gambar',
			'type'     => 'browse',
			'fake'     => true,
			'store_in' => 'extras',
			'hint'     => 'Gambar sebaiknya berukuran 400x197px',
        ]);
        $this->crud->addField([
			'name'     => 'url',
			'label'    => 'Link / Url',
			'type'     => 'url',
			'fake'     => true,
			'store_in' => 'extras',
		]);
		$this->crud->addField([    // WYSIWYG
			'name'        => 'desc',
			'label'       => 'Deskripsi Singkat',
			'type'        => 'text',
			'placeholder' => 'Keterangan teks',
			'fake'        => true,
			'store_in'    => 'extras',
        ]);
		
	}

	private function topmenu()
	{
		$this->crud->addField([
								'name'     => 'text',
								'label'    => 'Teks Url / Link',
								'fake'     => true,
								'store_in' => 'extras',
                            ]);
		$this->crud->addField([
								'name'     => 'url',
								'label'    => 'Url atau Link',
								'type'     => 'url',
								'fake'     => true,
								'store_in' => 'extras',
                            ]);
		$this->crud->addField([    // TEXT
								'name'     => 'icon',
								'label'    => 'Icon',
								'type'     => 'icon_picker',
								'iconset'  => 'fontawesome',
								'default'  => 'fa-car',
								'fake'     => true,
								'store_in' => 'extras',
                            ]);
	}

	private function social()
	{
		$this->crud->addField([    // WYSIWYG
			'name'        => 'facebook',
			'label'       => 'Facebook',
			'type'        => 'text',
			'placeholder' => 'Link Facebook',
			//'default'     => 'https://www.facebook.com/',
			'fake'        => true,
			'store_in'    => 'extras',
        ]);
		$this->crud->addField([    // WYSIWYG
			'name'        => 'twitter',
			'label'       => 'Twitter',
			'type'        => 'text',
			'placeholder' => 'Link Twitter',
			//'default'     => 'https://twitter.com/',
			'fake'        => true,
			'store_in'    => 'extras',
        ]);
		$this->crud->addField([    // WYSIWYG
			'name'        => 'youtube',
			'label'       => 'Youtube',
			'type'        => 'text',
			'placeholder' => 'Link Youtube',
			//'default'     => 'https://www.youtube.com/',
			'fake'        => true,
			'store_in'    => 'extras',
        ]);
		$this->crud->addField([    // WYSIWYG
			'name'        => 'instagram',
			'label'       => 'Instagram',
			'type'        => 'text',
			'placeholder' => 'Link Instagram',
			//'default'     => 'https://www.instagram.com/',
			'fake'        => true,
			'store_in'    => 'extras',
        ]);
	}

	private function populer()
	{
		$this->crud->addField([
            'name' => 'berdasarkan',
            'label' => 'Berdasarkan',
            'fake' => true,
            'store_in' => 'extras',
            'type' => 'select_from_array',
            'options' => [  
               	'one_day_stats' => '1 Hari Lalu', 
              	'seven_days_stats' => '7 Hari Lalu', 
               	'thirty_days_stats' => '30 Hari Lalu', 
               	'all_time_stats' => 'Semua Waktu',
            ],
            'allows_null' => false,
            'allows_multiple' => false,
        ]);
		$this->crud->addField([
		    'name' => 'number',
		    'label' => 'Jumlah',
		    'type' => 'number',
            'fake' => true,
            'store_in' => 'extras',
		]);	
	}

	private function recent()
	{
		$this->crud->addField([
		    'name' => 'number',
		    'label' => 'Jumlah',
		    'type' => 'number',
            'fake' => true,
            'store_in' => 'extras',
		]);
		
	}

	private function image()
	{
		$this->crud->addField([ 
		    'name' => 'image',
		    'label' => 'Image',
		    'type' => 'browse',
            'fake' => true,
            'store_in' => 'extras',
            'readonly' => false,
            /*'name' => 'photos',
		    'label' => 'Photos',
		    'type' => 'upload_multiple',
		    'upload' => true,
		    'disk' => 'uploads',*/
		]);
		$this->crud->addField([
		    'name' => 'url',
		    'label' => 'Link / Url',
		    'type' => 'url',
            'fake' => true,
            'store_in' => 'extras',
		]);
	}

	private function images()
	{
		$this->crud->addField([ 
		    'name' => 'image_1',
		    'label' => 'Image',
		    'type' => 'browse',
            'fake' => true,
            'store_in' => 'extras',
		]);
		$this->crud->addField([
		    'name' => 'url_1',
		    'label' => 'Link / Url',
		    'type' => 'url',
            'fake' => true,
            'store_in' => 'extras',
		]);
		$this->crud->addField([ 
		    'name' => 'image_2',
		    'label' => 'Image',
		    'type' => 'browse',
            'fake' => true,
            'store_in' => 'extras',
		]);
		$this->crud->addField([
		    'name' => 'url_2',
		    'label' => 'Link / Url',
		    'type' => 'url',
            'fake' => true,
            'store_in' => 'extras',
		]);
		$this->crud->addField([ 
		    'name' => 'image_3',
		    'label' => 'Image',
		    'type' => 'browse',
            'fake' => true,
            'store_in' => 'extras',
		]);
		$this->crud->addField([
		    'name' => 'url_3',
		    'label' => 'Link / Url',
		    'type' => 'url',
            'fake' => true,
            'store_in' => 'extras',
		]);
	}

	private function video()
	{
		$this->crud->addField([
		    'name' => 'video',
		    'label' => 'Video Youtube',
		    'type' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
		]);
		
	}

	private function gallery()
	{
		//
	}

	private function categories()
	{
		//
	}

	private function address()
	{
		$this->crud->addField([
		    'name' => 'address',
		    'label' => 'Alamat',
		    'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
		]);
		$this->crud->addField([
		    'name' => 'province',
		    'label' => 'Provinsi',
		    'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
		]);
		$this->crud->addField([
		    'name' => 'phone',
		    'label' => 'Nomor Telepon / Handphone',
		    'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
		]);
		$this->crud->addField([
		    'name' => 'email',
		    'label' => 'Email',
		    'type' => 'email',
            'fake' => true,
            'store_in' => 'extras',
		]);
		$this->crud->addField([
		    'name' => 'map',
		    'label' => 'Embed Map dari Google Maps',
		    'type' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
		]);
	}
}