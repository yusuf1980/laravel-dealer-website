<?php

namespace App\Http\ViewComposers;

use App\Models\Article;
use App\Models\Category;
use App\Functions\Popularity;
use App\Traits\WidgetsTrait;
use Illuminate\Contracts\View\View;

class SidebarComposer
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
        $data['widget_recent'] = Article::orderBy('id', 'desc')->take(10)->get();
        /*$data['widget_populer'] = $this->widget('sidebar', 'kolom-1');
        $data['widget_categories'] = $this->widget('sidebar', 'kolom-2');
        $data['widget_recent'] = $this->widget('sidebar','kolom-3');
        $data['widget_video'] = $this->widget('sidebar','kolom-4');

        $data['posts'] = Article::orderBy('id', 'desc')->limit($data['widget_recent']->number)->get();
        $data['show_categories'] = Category::orderBy('name', 'asc')->get();
        $popularity = new Popularity();
        if(empty($data['widget_populer']->berdasarkan)){
            $days = 'all_time_stats';
        }else {
            $days = $data['widget_populer']->berdasarkan;
        }
        if(empty($data['widget_populer']->number)){
            $limit = 4;
        }else {
            $limit = $data['widget_populer']->number;
        }
        
        //$data['populer'] = $popularity->getStats($berdasarkan,'DESC','App\Models\Article',$data['widget_populer']->number)->get();
        
        $data['populer'] = Article::select('articles.*')
            ->leftjoin('stats', 'stats.trackable_id', '=', 'articles.id')
            ->where('stats.'.$days, '!=', 0)
            ->orderBy('.stats.'.$days, 'desc')
            ->limit($limit)
            ->get();*/
        
        $view->with( $data );
    }
}