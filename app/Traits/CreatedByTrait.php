<?php namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait CreatedByTrait {

    /**
     * Stores the user id at each create & update.
     */
    public function save(array $options = [])
    {

        if (\Auth::check())
        {
            
            $this->user_id = \Auth::user()->id;

            //$this->updated_by = \Auth::user()->id;
        }

        parent::save();
    }


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function creator()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /*public function updator()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }*/
}