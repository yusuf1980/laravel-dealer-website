<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\GalleryRequest as StoreRequest;
use App\Http\Requests\GalleryRequest as UpdateRequest;
use App\Traits\AjaxUploadImagesTrait;
use App\Models\GalleryFoto;

class GalleryCrudController extends CrudController
{
    use AjaxUploadImagesTrait;

    public function __construct()
    {
        parent::__construct();

        $this->middleware(['permission:manage galeri foto']);

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        //$this->crud->setModel("Backpack\NewsCRUD\app\Models\Category");
        $this->crud->setModel("App\Models\GalleryFoto");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'kaltara').'/photos');
        //$this->crud->setRoute('Admin\CategoryCrudController');
        //$this->crud->setEntityNameStrings('category', 'categories');
        $this->crud->setEntityNameStrings('album', 'album');

        /*$this->crud->allowAccess('reorder');
        $this->crud->enableReorder('name', 1);*/

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name'  => 'name',
                                'label' => 'Nama Album',
                            ]);
        $this->crud->addColumn([
                                'name'  => 'description',
                                'label' => 'Deskripsi',
                            ]);

        // ------ CRUD FIELDS
        $this->crud->addField([    // SELECT
                                'label'     => 'Nama Album',
                                'type'      => 'text',
                                'name'      => 'name',
                            ]);
        
        $this->crud->addField([
                                'name'  => 'slug',
                                'label' => 'Slug (URL)',
                                'type'  => 'text',
                                'hint'  => 'Akan otomatis dihasilkan dari judul Anda, jika dibiarkan kosong.',
                                // 'disabled' => 'disabled'
                            ]);
        
        $this->crud->addField([
                                'label' => "Gambar Cover",
                                'name' => "cover_image",
                                'type' => 'image',
                                'upload' => true,
                                'crop' => true,
                                'aspect_ratio' => 1,
                                'prefix' => 'images/' // in case you only store the filename in the database, this text will be prepended to the database value
        ]);
        $this->crud->addField([
					            'name' => 'images',
                                'label' => 'Foto Galeri (bisa langsung beberapa gambar)',
                                'type' => 'upload_multiple',
                                'upload' => true,
                                'disk' => 'images',
        ], 'create');
		$this->crud->addField([
                                'label'         => 'Foto Galeri',
                                'name'          => 'images',
					            'type'          => 'dropzone',
					            'upload_route'  => 'upload_images',
					            'reorder_route' => 'reorder_images',
					            'delete_route'  => 'delete_image',
					            'disk'          => 'images', // local disk where images will be uploaded
					            'mimes'         => 'image/*', //allowed mime types separated by comma. eg. image/*, application/*, etc
					            'filesize'      => 5, // maximum file size in MB
        ], 'update');

        $this->crud->addField([
                                'label'     => 'Deskripsi',
                                'type'      => 'textarea',
                                'name'      => 'description',
                            ]);
        $this->crud->addField([    // CHECKBOX
                                'name'  => 'comments',
                                'label' => 'Izinkan Komentar',
                                'type'  => 'checkbox',
                            ]);
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}
