<?php

namespace App\Http\ViewComposers;

use App\Models\MenuItem;
use Illuminate\Contracts\View\View;

class MenuComposer
{

    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $this->data['menu_items'] = MenuItem::getTree();

        $view->with( $this->data );
    }
}