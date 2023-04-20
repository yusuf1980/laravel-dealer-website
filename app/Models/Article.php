<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Carbon\Carbon;
use App\Models\Stat;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scope\Statused;

class Article extends Model
{
    use CrudTrait;
    use Sluggable, SluggableScopeHelpers;
    use SoftDeletes;
    use Statused;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'articles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = [
        'slug', 'title', 'content', 'image', 'status', 'category_id', 'comments', 'date', 'user_id', 'icon',
        'meta_title', 'meta_keyword', 'meta_description'
    ];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'comments'  => 'boolean',
        'date'      => 'date',
    ];
    protected $dates = ['deleted_at'];
    protected $guard_name = 'web'; // or whatever guard you want to use

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            \Storage::disk('images')->delete($obj->image);
        });
    }

    // Tambahan untuk mematikan global scope
    public function clearGlobalScopes()
    {
        static::$globalScopes = [];
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

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'article_tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopePublished($query)
    {
        return $query->where('status', 'PUBLISHED')
                    ->where('date', '<=', date('Y-m-d'))
                    ->orderBy('date', 'DESC');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    // The slug is created automatically from the "title" field if no slug exists.
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;
    }

    public function getDateHumanAttribute()
    {
        $carbon = new Carbon;
        return $carbon->createFromTimeStamp(strtotime($this->date))->diffForHumans();
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

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
        $destination_path = "articles";

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
            $image = \Image::make($value)->resize(195, 109);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
    }
}
