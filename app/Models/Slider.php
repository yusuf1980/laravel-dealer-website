<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Slider extends Model
{
    use CrudTrait;

    protected $table = 'sliders';
    protected $primaryKey = 'id';
    public $timestamps     = true;
    protected $fillable = ['title','image', 'status','url','template'];

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            \Storage::disk('images')->delete($obj->image);
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'PUBLISHED')
                    ->where('date', '<=', date('Y-m-d'))
                    ->orderBy('date', 'DESC');
    }

    public function getTemplateName()
    {
        return trim(preg_replace('/(id|at|\[\])$/i', '', ucfirst(str_replace('_', ' ', $this->template))));
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "images";
        $destination_path = "sliders";
        $template = $this->template;

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
            /*if($template == 'with_frame') {
                $image->resize(1000, 500);
                $image->resizeCanvas(1564, 500, 'right', false, 'ff00ff');
                $image->insert($disk.'/'.'frame-image-slider-background.png', 'center');
            } else {
                $image->resize(1564, 500);
            }*/

            $image->resize(1024, 465);
            
            //$image->resizeCanvas(300, 200);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
    }
}
