<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Auth;
use App\Models\Product;
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;

class ProductCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware(['permission:edit artikel']);

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\Product");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'amartha').'/product');
        //$this->crud->setEntityNameStrings('article', 'articles');
        $this->crud->setEntityNameStrings('produk', 'produk');

        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('title', 1);

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
         $this->crud->addColumn([
                                'name'  => 'image',
                                'label' => 'Gambar',
                                'type'  => 'image',
                                'prefix'=> 'images/products/',
                                'height'=> '70px',
                                'width' => '70px',
                            ]);
        /*$this->crud->addColumn([
                                'name'  => 'date',
                                'label' => 'Tanggal',
                                'type'  => 'date',
                            ]);*/
        $this->crud->addColumn([
                                'name'  => 'title',
                                'label' => 'Judul',
                            ]);
        $this->crud->addColumn([
                                'name'  => 'status',
                                'label' => 'Status',
                            ]);

        //$this->crud->addButtonFromModelFunction('line', 'media', 'getOpenButton', 'beginning');
        $this->crud->addButtonFromView('line', 'product_media', 'product_media', 'beginning');

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

        $this->crud->addField([    // CHECKBOX
                                'name'  => 'featured',
                                'label' => 'Tampilkan Gambar di Menu',
                                'type'  => 'checkbox',
                                'default' => 1,
                                'hint'  => 'Kalau dicentang gambar akan tampil pada menu Product.',
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
        $this->crud->addField([    // Image
                                'name'  => 'image',
                                'label' => 'Gambar Thumbnail',
                                'type' => 'image',
                                'aspect_ratio' => 2,
                                'crop' => true,
                                'prefix' => 'images/products/330/',
                                'hint'  => 'Gambar sebaiknya berukuran 330px x 165px, berekstensi .png',
                            ]);
        $this->crud->addField([    // SELECT
                                'label'     => 'Kategori',
                                'type'      => 'select2',
                                'name'      => 'category_id',
                                'entity'    => 'category',
                                'attribute' => 'name',
                                'model'     => "App\Models\ProductCategory",
                            ]);
        $this->crud->addField([    // SELECT
                                'name' => 'variants',
                                'label' => 'Variants',
                                'type' => 'table',
                                'entity_singular' => 'option', // used on the "Add X" button
                                'columns' => [
                                    'title' => 'Nama',
                                    'price' => 'Harga'
                                ],
                                'max' => 10, 
                                'min' => 0,
                                'hint'  => 'Untuk harga tidak perlu diberi tanda titik, koma, atau Rp. Dan kolom Harga harus diisi.',
                            ]);
        $this->crud->addField([    // Image
                                'name'  => 'brocure',
                                'label' => 'Download Brosur',
                                'type' => 'browse',
                                //'disk' => 'upload/',
                                'hint'  => 'Pilih atau unggah brosur untuk di download',
                            ]);
        $this->crud->addField([    // Image
                                'name'  => 'header',
                                'label' => 'Gambar Header',
                                'type' => 'image',
                                'aspect_ratio' => 2.15,
                                'crop' => true,
                                'prefix' => 'images/',
                                'hint'  => 'Lebar Gambar sebaiknya berukuran 1024px, berekstensi .jpg',
                            ]);

        $this->crud->addField([    // TEXT
                                'name'  => 'title_one',
                                'label' => 'Judul Konten Satu',
                                'type'  => 'text',
                                'fake' => true,
                                'store_in' => 'content_one',
                                'attributes' => [
                                    'placeholder' => 'Judul Konten Satu di sini'
                                ],
                            ]);
        $this->crud->addField([    // WYSIWYG
                                'name'        => 'desc_one',
                                'label'       => 'Kontent Satu',
                                'type'        => 'tinymce',
                                'placeholder' => 'Isi teks di sini.',
                                'fake' => true,
                                'store_in' => 'content_one',
                                'hint'  => 'Untuk Gambar lebar penuh sebaiknya berukuran minimal 1024px',
                            ]);

        $this->crud->addField([    // TEXT
                                'name'  => 'title_two',
                                'label' => 'Judul Konten Dua',
                                'type'  => 'text',
                                'fake' => true,
                                'store_in' => 'content_two',
                                'attributes' => [
                                    'placeholder' => 'Judul Konten Dua di sini'
                                ]
                            ]);
        $this->crud->addField([    // WYSIWYG
                                'name'        => 'desc_two',
                                'label'       => 'Konten Dua',
                                'type'        => 'tinymce',
                                'placeholder' => 'Isi teks di sini.',
                                'hint'  => 'Untuk Gambar lebar penuh sebaiknya berukuran minimal 1024px',
                                'fake' => true,
                                'store_in' => 'content_two',
                            ]);

        $this->crud->addField([    // TEXT
                                'name'  => 'title_three',
                                'label' => 'Judul Konten Tiga',
                                'type'  => 'text',
                                'fake' => true,
                                'store_in' => 'content_three',
                                'attributes' => [
                                    'placeholder' => 'Judul Konten Tiga di sini'
                                ]
                            ]);
        $this->crud->addField([    // WYSIWYG
                                'name'        => 'desc_three',
                                'label'       => 'Konten Tiga',
                                'type'        => 'tinymce',
                                'placeholder' => 'Isi teks di sini.',
                                'hint'  => 'Untuk Gambar lebar penuh sebaiknya berukuran minimal 1024px',
                                'fake' => true,
                                'store_in' => 'content_three',
                            ]);

        $this->crud->addField([    // TEXT
                                'name'  => 'title_four',
                                'label' => 'Judul Konten Empat',
                                'type'  => 'text',
                                'fake' => true,
                                'store_in' => 'content_four',
                                'attributes' => [
                                    'placeholder' => 'Judul Konten Empat di sini'
                                ]
                            ]);
        $this->crud->addField([    // WYSIWYG
                                'name'        => 'desc_four',
                                'label'       => 'Konten Empat',
                                'type'        => 'tinymce',
                                'placeholder' => 'Isi teks di sini.',
                                'hint'  => 'Untuk Gambar lebar penuh sebaiknya berukuran minimal 1024px',
                                'fake' => true,
                                'store_in' => 'content_four',
                            ]);

        $this->crud->addField([    // WYSIWYG
                                'name'        => 'content',
                                'label'       => 'Konten Lainnya',
                                'type'        => 'tinymce',
                                'placeholder' => 'Isi teks di sini.',
                                'hint'  => 'Untuk Gambar lebar penuh sebaiknya berukuran minimal 1024px',
                            ]);

        // Next field can found in setup()
        
        //$this->crud->enableAjaxTable();
    }

    public function setup()
    {
        parent::setup();
        
        // Disable Global Scope Status
        //$this->crud->query = $this->crud->query->withoutGlobalScopes();
        //$this->crud->model->clearGlobalScopes();

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
            /*$this->crud->addField([    // CHECKBOX
                                'name'  => 'comments',
                                'label' => 'Izinkan Komentar',
                                'type'  => 'checkbox',
                                'default' => 1,
                            ]);*/
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
        $article = Product::find($id);
        if (!Auth::user()->can('edit artikel lain') && $article->user_id != $user_id) {
            abort(403);
        }
        return parent::edit($id);
    }

    public function update(UpdateRequest $request)
    {
        //dd($request->all());
        $user_id = Auth::user()->id;
        $article = Product::find($request['id']);
        if (!Auth::user()->can('edit artikel lain') && $article->user_id != $user_id) {
            abort(403);
        }
        return parent::updateCrud();
    }

    public function destroy($id)
    {
        $user_id = Auth::user()->id;
        $article = Product::find($id);
        if (!Auth::user()->can('hapus artikel')) {
            abort(403);
        }
        if (!Auth::user()->can('hapus artikel lain') && $article->user_id != $user_id) {
            abort(403);
        }

        $this->crud->hasAccessOrFail('delete');

        return $this->crud->delete($id);
    }

    public function show($id)
    {
        //return parent::show($id); 
        return parent::show($this->request->id);
    }
}
