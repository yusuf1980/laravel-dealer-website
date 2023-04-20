<?php

namespace App\Traits;

use App\Models\Dynamic;

trait WidgetsTrait
{
	private function widget($position = 'homepage',$name = 'kolom-1')
    {
    	$data = Dynamic::where('position', $position)->where('active', 1)
    		     ->where('name', $name)->first();
    	$data = $data->withFakes();

    	return $data;
    }
}