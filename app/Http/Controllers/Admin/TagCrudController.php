<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation

use App\Http\Requests\TagRequest as StoreRequest;
use App\Http\Requests\TagRequest as UpdateRequest;

class TagCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware(['permission:manage tags']);

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\Tag");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'kaltara').'/tag');
        $this->crud->setEntityNameStrings('tag', 'tags');

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name'  => 'name',
                                'label' => 'Nama',
                            ]);
        $this->crud->addColumn([
                                'name'  => 'slug',
                                'label' => 'Slug',
                            ]);

        // ------ CRUD FIELDS
        $this->crud->addField([
                                'name'  => 'name',
                                'label' => 'Nama',
                            ]);
        $this->crud->addField([
                                'name'  => 'slug',
                                'label' => 'Slug (URL)',
                                'type'  => 'text',
                                'hint'  => 'Akan otomatis dihasilkan dari judul Anda, jika dibiarkan kosong.',
                                // 'disabled' => 'disabled'
                            ]);
        $this->crud->addField([   // CustomHTML
                        'name' => 'metas_separator',
                        'type' => 'custom_html',
                        'value' => '<br><h4>Optional</h4><hr>',
                    ]);
        $this->crud->addField([
            'name'       => 'meta_title',
            'label'      => 'Judul Meta',
            'hint'       => 'Judul yang akan tampil pada mesin pencari seperti google',
        ]);
        $this->crud->addField([
            'name'       => 'meta_keyword',
            'label'      => 'Meta Keyword',
            'hint'       => 'Kata kunci yang akan digunakan pada mesin pencari seperti google',
            'attributes' => [
                'placeholder' => 'setiap kata kunci pisahkan dengan koma'
            ]
        ]);
        $this->crud->addField([
            'name'  => 'meta_description',
            'label' => 'Meta Description',
            'hint'  => 'Deskripsi yang akan digunakan pada mesin pencari seperti google',
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
