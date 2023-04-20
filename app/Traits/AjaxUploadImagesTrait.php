<?php namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait AjaxUploadImagesTrait {

    /**
     * Upload an image with AJAX to the disk
     * and store its path in the database.
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function ajaxUploadImages(Request $request)
    {
        $entry = $this->crud->getEntry($request->input('id'));
       // $attribute_name = $entry->upload_multiple['attribute'];
        $attribute_name = $this->crud->getFields('update', $entry->id)['images']['name'];
        $files = $request->file($attribute_name);
        $file_count = count($files);

        $entry->{$attribute_name} = $files;
        $entry->save();

        return response()->json([
            'success' => true,
            'message' => ($file_count>1)?'Uploaded '.$file_count.' images.':'Foto berhasil diunggah.',
            'images' => $entry->{$attribute_name},
        ]);
    }

    /**
     * Save new images order from sortable object.
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function ajaxReorderImages(Request $request)
    {
        $entry = $this->crud->getEntry($request->input('entry_id'));
        $entry->updateImageOrder($request->input('order'));

        return response()->json([
            'success' => true,
            'message' => 'Urutan baru foto telah tersimpan.'
        ]);
    }

    /**
     * Delete an image from the database and disk.
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function ajaxDeleteImage(Request $request)
    {
        $image_id = $request->input('image_id');
        $image_path = $request->input('image_path');
        $entry = $this->crud->getEntry($request->input('entry_id'));
        $disk = $this->crud->getFields('update', $entry->id)['images']['disk'];

        // delete the image from the db
        $entry->removeImage($image_id, $image_path, $disk);

        return response()->json([
            'success' => true,
            'message' => 'Foto dihapus.',
        ]);
    }
}