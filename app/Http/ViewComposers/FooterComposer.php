<?php

namespace App\Http\ViewComposers;

use App\Traits\WidgetsTrait;
use Illuminate\Contracts\View\View;

class FooterComposer
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
        $data                  = array();
        $data['address_fake']  = $this->widget('footer', 'kolom-1');
        $data['support_fake']  = $this->widget('footer', 'kolom-2');
        $data['social'] = $this->widget('footer', 'kolom-3');

        $view->with( $data );
    }
}