<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use File;

class GalleryFoto extends Model
{
	use CrudTrait;
    use Sluggable, SluggableScopeHelpers;
	
    protected $table = 'gallery_fotos';
  
  	protected $fillable = array('slug','description','images','name', 'cover_image', 'comments');
  	protected $casts = ['images' => 'array'];

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            \Storage::disk('images')->delete($obj->cover_image);
        });
    }

    public function updateImageOrder($order) {
		$new_images_attribute = [];

		foreach ($order as $key => $image) {
		    $new_images_attribute[$image['id']] = $image['path'];
		}
		$new_images_attribute = json_encode($new_images_attribute);

		$this->attributes['images'] = $new_images_attribute;
		$this->save();
	}

	public function removeImage($image_id, $image_path, $disk)
	{
		// delete the image from the db
		$images = json_encode(array_except($this->images, [$image_id]));
		$this->attributes['images'] = $images;
		$this->save();

		// delete the image from the folder
		/*if (Storage::disk($disk)->has($image_path)) {
		    Storage::disk($disk)->delete($image_path);
		}*/
		File::delete($disk.'/'.$image_path);

	}


    public function setImagesAttribute($value)
    {
		$attribute_name   = "images";
		$disk             = "images";
		$destination_path = "albums";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setCoverImageAttribute($value)
    {
		$attribute_name   = "cover_image";
		$disk             = "images";
		$destination_path = "covers";

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
            if(!empty($this->cover_image)) {
                \Storage::disk($disk)->delete($this->{$attribute_name});
            }
            // 0. Make the image
            $image = \Image::make($value)->resize(200, 200);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
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
                'source' => 'slug_or_name',
                'onUpdate' => true,
            ],
        ];
    }

    // The slug is created automatically from the "title" field if no slug exists.
    public function getSlugOrNameAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->name;
    }
}
