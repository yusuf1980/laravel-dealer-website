<?php namespace App\Traits;

trait FrameSliderTrait
{
	/*private function with_frame()
	{
		$this->crud->addField([    // Image
                                'name' => 'image',
                                'label' => 'Image',
                                'type' => 'image',
                                'upload' => true,
                                'crop' => true,
                                //'aspect_ratio' => 3.14,
                                'aspect_ratio' => 2,
                                'prefix' => 'images/',
                            ]);
	}*/

	private function original()
	{
		$this->crud->addField([    // Image
                                'name' => 'image',
                                'label' => 'Image',
                                'type' => 'image',
                                'upload' => true,
                                'crop' => true,
                                'aspect_ratio' => 2.205,
                                //'aspect_ratio' => 2,
                                'prefix' => 'images/',
                                'hint'  => 'Ukuran sebaiknya: 1024 x 465px',
                            ]);
	}
}