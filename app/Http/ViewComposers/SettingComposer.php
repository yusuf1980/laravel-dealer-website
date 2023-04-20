<?php

namespace App\Http\ViewComposers;

use App\Models\Setting;
use Illuminate\Contracts\View\View;

class SettingComposer
{

    
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $settings = Setting::all();

        $view->with([ 'settings' => $settings ]);
    }
}