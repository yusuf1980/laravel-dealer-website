<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Product;

class ProductsMenuComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $data                  = array();
        $data['productmenu']  = Product::where('featured', 1)->orderBy('lft')->get();

        $view->with( $data );
    }
}