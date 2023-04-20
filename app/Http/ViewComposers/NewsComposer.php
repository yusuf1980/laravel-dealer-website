<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Article;

class NewsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $data                 = array();
        //$data['news']  = Article::orderBy('date', 'desc')->orderBy('id','desc')->paginate(8);
        $data['news']  = Article::orderBy('date', 'desc')->orderBy('id','desc')->paginate(10);

        $view->with( $data );
    }
}