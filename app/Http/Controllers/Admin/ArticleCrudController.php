<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Auth;
use App\Models\Article;
//use App\Traits\CreatedByTrait;
use App\Http\Requests\ArticleRequest as StoreRequest;
use App\Http\Requests\ArticleRequest as UpdateRequest;

class ArticleCrudController extends CrudController
{
    //use CreatedByTrait;

    public function __construct()
    {
        parent::__construct();

        //$this->middleware(['permission:edit artikel']);
        //$this->middleware(['auth', 'clearance'])->except('index', 'show');
        $this->middleware(['permission:edit artikel']);

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\Article");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'amartha').'/article');
        //$this->crud->setEntityNameStrings('article', 'articles');
        $this->crud->setEntityNameStrings('artikel', 'artikel');

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name'  => 'date',
                                'label' => 'Tanggal',
                                'type'  => 'date',
                            ]);
        $this->crud->addColumn([
                                'name'  => 'title',
                                'label' => 'Judul',
                            ]);
        $this->crud->addColumn([
                                'label' => 'Kategori',
                                'type' => 'select',
                                'name' => 'category_id',
                                'entity' => 'category',
                                'attribute' => 'name',
                                'model' => "App\Models\Category",
                            ]);
        $this->crud->addColumn([
                                'name'  => 'status',
                                'label' => 'Status',
                            ]);

        // ------ CRUD FIELDS
        //if (Auth::user()->hasPermissionTo('edit articles')) {}
        $this->crud->addField([    // TEXT
                                'name'  => 'title',
                                'label' => 'Judul',
                                'type'  => 'text',
                                'attributes' => [
                                    'placeholder' => 'Judul Anda di sini'
                                ]
                            ]);
        $this->crud->addField([
                                'name'  => 'slug',
                                'label' => 'Slug (URL)',
                                'type'  => 'text',
                                'hint'  => 'Akan otomatis dihasilkan dari judul Anda, jika dibiarkan kosong.',
                                // 'disabled' => 'disabled'
                            ]);

        $this->crud->addField([    // TEXT
                                'name'  => 'date',
                                'label' => 'Tanggal',
                                'type'  => 'date',
                                'value' => date('Y-m-d'),
                                'hint'  => 'Format: Bulan, Tanggal, Tahun',
                            ], 'create');
        $this->crud->addField([    // TEXT
                                'name'  => 'date',
                                'label' => 'Tanggal',
                                'type'  => 'date',
                                'hint'  => 'Format: Bulan, Tanggal, Tahun',
                            ], 'update');

        /*$this->crud->addField([    // TEXT
                                'name'  => 'icon',
                                'label' => 'Icon',
                                'type'  => 'icon_picker',
                                'iconset' => 'fontawesome',
                                'default' => 'fa-newspaper-o',
                            ]);*/

        $this->crud->addField([    // WYSIWYG
                                'name'        => 'content',
                                'label'       => 'Konten',
                                'type'        => 'tinymce',
                                'placeholder' => 'Your textarea text here',
                            ]);
        $this->crud->addField([    // Image
                                'name'  => 'image',
                                'label' => 'Gambar Thumbnail',
                                'type' => 'image',
                                'aspect_ratio' => 1.7,
                                'crop' => true,
                                'prefix' => 'images/',
                            ]);
        $this->crud->addField([    // SELECT
                                'label'     => 'Kategori',
                                'type'      => 'select2',
                                'name'      => 'category_id',
                                'entity'    => 'category',
                                'attribute' => 'name',
                                'model'     => "App\Models\Category",
                            ]);
        $this->crud->addField([       // Select2Multiple = n-n relationship (with pivot table)
                                'label'     => 'Tags',
                                'type'      => 'select2_multiple',
                                'name'      => 'tags', // the method that defines the relationship in your Model
                                'entity'    => 'tags', // the method that defines the relationship in your Model
                                'attribute' => 'name', // foreign key attribute that is shown to user
                                'model'     => "App\Models\Tag", // foreign key model
                                'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?
                            ]);
        // Next field can found in setup()
       
        
        $this->crud->enableAjaxTable();
    }

    public function setup()
    {
        parent::setup();
        
        // Disable Global Scope Status
        $this->crud->query = $this->crud->query->withoutGlobalScopes();
        $this->crud->model->clearGlobalScopes();
        // Clause for can edit other article, if 'can' user can see all lists
        // if not user just can see his list articles
        $user_id = Auth::user()->id;
        if (!Auth::user()->can('edit artikel lain')) {
            $this->crud->addClause('where', 'user_id' , '=', $user_id);
        }
        $this->crud->orderBy('id', 'desc');

        // Give permission to Status Field 
        if (Auth::user()->hasPermissionTo('publish artikel')) {
             $this->crud->addField([    // ENUM
                                'name'  => 'status',
                                'label' => 'Status',
                                'type'  => 'enum',
                            ]);
        }
            $this->crud->addField([    // CHECKBOX
                                'name'  => 'comments',
                                'label' => 'Izinkan Komentar',
                                'type'  => 'checkbox',
                                'default' => 1,
                            ]);
        $this->crud->addField([   // CustomHTML
                        'name' => 'metas_separator',
                        'type' => 'custom_html',
                        'value' => '<br><h4>Optional</h4><hr>',
                    ]);
        $this->crud->addField([
            'name'       => 'meta_title',
            'label'      => 'Judul Meta',
            'hint'       => 'Judul khusus yang akan tampil pada mesin pencari seperti google',
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
        $request['user_id'] = Auth::user()->id;
        return parent::storeCrud($request);
    }

    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $article = Article::find($id);
        if (!Auth::user()->can('edit artikel lain') && $article->user_id != $user_id) {
            abort(403);
        }
        return parent::edit($id);
    }

    public function update(UpdateRequest $request)
    {
        $user_id = Auth::user()->id;
        $article = Article::find($request['id']);
        if (!Auth::user()->can('edit artikel lain') && $article->user_id != $user_id) {
            abort(403);
        }
        return parent::updateCrud();
    }

    public function destroy($id)
    {
        $user_id = Auth::user()->id;
        $article = Article::find($id);
        if (!Auth::user()->can('hapus artikel')) {
            abort(403);
        }
        if (!Auth::user()->can('hapus artikel lain') && $article->user_id != $user_id) {
            abort(403);
        }

        $this->crud->hasAccessOrFail('delete');

        return $this->crud->delete($id);
    }

}
