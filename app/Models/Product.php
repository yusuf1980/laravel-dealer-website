<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Scope\Statused;
use Carbon\Carbon;
use App\Models\Stat;

class Product extends Model
{
    use CrudTrait;
    use Sluggable;
    use SluggableScopeHelpers;
    use SoftDeletes;
    use Statused;

    protected $table      = 'products';
    protected $primaryKey = 'id';
    public $timestamps    = true;
    // protected $guarded = ['id'];
    protected $fillable   = ['template', 'category_id', 'title', 'slug', 'content', 'comments','parent_id', 
    'meta_keyword', 'meta_description', 'meta_title', 'image', 'status', 'variants','date','brocure',
    'featured','header','content_one','content_two','content_three','content_four'];
    protected $dates      = ['deleted_at'];
    protected $casts      = ['variants' => 'array'];
    protected $fakeColumns = ['content_one', 'content_two', 'content_three', 'content_four'];

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            \Storage::disk('images')->delete($obj->image);
            \Storage::disk('images')->delete($obj->header);
        });
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
                'onUpdate' => true,
            ],
        ];
    }

    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;
    }

    public function product_category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'PUBLISHED')
                    ->where('date', '<=', date('Y-m-d'))
                    ->orderBy('date', 'DESC');
    }

    public function getDateHumanAttribute()
    {
        $carbon = new Carbon;
        return $carbon->createFromTimeStamp(strtotime($this->date))->diffForHumans();
    }

    public function stats()
    {
        return $this->morphOne('App\Models\Stat', 'trackable');
    }

    public function hit()
    {
        //check if a polymorphic relation can be set
        if($this->exists){
            $stats = $this->stats()->first();
            if( empty( $stats ) ){
                //associates a new Stats instance for this instance
                $stats = new Stat();
                $this->stats()->save($stats);
            }
            return $stats->updateStats();
        }
        return false;
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "images";
        $destination_path = "products";
        $dest330 = "products/330";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            if(!empty($this->image)) {
                \Storage::disk($disk)->delete($destination_path.'/'.$this->{$attribute_name});
                \Storage::disk($disk)->delete($dest330.'/'.$this->{$attribute_name});
            }
            // 0. Make the image
            $price = \Image::make($value)->resize(330, 165);
            $image = \Image::make($value)->resize(225, 113);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.png';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            \Storage::disk($disk)->put($dest330.'/'.$filename, $price->stream());
            // 3. Save the path to the database
            //$this->attributes[$attribute_name] = $destination_path.'/'.$filename;
            $this->attributes[$attribute_name] = $filename;
        }
    }

    public function setHeaderAttribute($value)
    {
        $attribute_name   = "header";
        $disk             = "images";
        $destination_path = "products/header";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            if(!empty($this->image)) {
                \Storage::disk($disk)->delete($this->{$attribute_name});
            }
            // 0. Make the image
            $image = \Image::make($value);
            $image->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
    }

    // Tambahan untuk mematikan global scope
    public function clearGlobalScopes()
    {
        static::$globalScopes = [];
    }

    public function getPageLink()
    {
        //return url('media/'.$this->id);
        return url(config('backpack.base.route_prefix', 'amartha').'/products/'.$this->id);
    }

    public function getOpenButton()
    {
        return '<a class="btn btn-default btn-xs" href="'.$this->getPageLink().'"><i class="fa fa-eye"></i> Media</a>';
    }

    public function media()
    {
        return $this->hasMany('App\Models\Media')->orderBy('lft');
    }

    public function scopeFirstLevelItems($query)
    {
        return $query->where('depth', '1')
                    ->orWhere('depth', null)
                    ->orderBy('lft', 'ASC');
    }

}
