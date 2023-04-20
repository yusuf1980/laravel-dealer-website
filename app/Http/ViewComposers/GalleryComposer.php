<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\GalleryFoto;

class GalleryComposer
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
        $data['galleries'] = GalleryFoto::orderBy('id','desc')->paginate(6);

        $view->with( $data );
    }
}