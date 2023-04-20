<?php

namespace App\Http\ViewComposers;

use App\Traits\WidgetsTrait;
use Illuminate\Contracts\View\View;

class TopMenuComposer
{   
    use WidgetsTrait;

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
    	$data = array();
        $data['kolom_1'] = $this->widget('topmenu', 'kolom-1');
        $data['kolom_2'] = $this->widget('topmenu', 'kolom-2');
        $data['kolom_3'] = $this->widget('topmenu', 'kolom-3');
        
        $view->with( $data );
    }
}