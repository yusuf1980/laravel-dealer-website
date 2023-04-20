<?php namespace App\Traits;

trait TipeMediaTrait
{
	public function image()
	{
		$this->crud->addField([    // Image
                                'name' => 'content',
                                'label' => 'Gambar',
                                'type' => 'browse'
                                //'hint'  => 'Ukuran sebaiknya: 1024 x 465px',
                            ]);
	}

	public function video()
	{
		$this->crud->addField([    // Image
								'name'  => 'video',
								'label' => 'Link ke video file dari Youtube',
								'type'  => 'video',
								'hint'  => 'Copy link / url dari Youtube',
                            ]);
	}
}