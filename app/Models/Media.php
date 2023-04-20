<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Media extends Model
{
    use CrudTrait;

    protected $table      = 'media';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable   = ['name', 'parent_id', 'template', 'content', 'product_id', 'video'];
    //protected $fakeColumns = ['video'];
    protected $casts = ['video' => 'array'];

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function scopeFirstLevelItems($query)
    {
        return $query->where('depth', '1')
                    ->orWhere('depth', null)
                    ->orderBy('lft', 'ASC');
    }
}
