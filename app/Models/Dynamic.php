<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Dynamic extends Model
{
    use CrudTrait;

    protected $table       = 'dynamics';
    protected $primaryKey  = 'id';
    public $timestamps     = true;
    protected $fillable    = ['title', 'extras'];
    protected $fakeColumns = ['extras'];

    /*public function getWidgetName()
    {
        return trim(preg_replace('/(id|at|\[\])$/i', '', ucfirst(str_replace('_', ' ', $this->widget))));
    }*/

    /*public function setImageAttribute($value)
    {
        $attribute_name   = "image";
        $disk             = "uploads";
        $destination_path = "/";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }*/


}
