<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
use App\Models\Product;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Controllers\Admin\ProductCrudController;
use App\Http\Requests\MediaRequest as StoreRequest;
use App\Http\Requests\MediaRequest as UpdateRequest;
use App\Traits\TipeMediaTrait;
//use App\Models\Media;
//use App\Http\Controllers\Controller;

class MediaCrudController extends CrudController
{    
    use TipeMediaTrait;

    private $id;

    public function setup() {

        parent::setup();

        $this->crud->setModel("App\Models\Media");

        // get the user_id parameter
        $product_id = \Route::current()->parameter('product_id');

        $this->id = $product_id;

        $product = Product::withDrafts()->whereId($product_id)->first();
        if(empty ($product)) { abort(404); }

        $this->crud->setEntityNameStrings('media '.$product->title, 'media '.$product->title);

        // set a different route for the admin panel buttons
        $this->crud->setRoute(config('backpack.base.route_prefix', 'amartha')."/product/".$product_id."/media");
        //$this->crud->setRoute(config('backpack.base.route_prefix', 'amartha')."/media");

        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('name', 1);

        // show only that user's posts
        $this->crud->addClause('where', 'product_id', '=', $product_id); 

        $this->crud->addColumn([
                                'name'  => 'name',
                                'label' => 'Nama',
                            ]);
        $this->crud->addColumn([
                                'name'  => 'template',
                                'label' => 'Tipe',
                            ]);
        /*$this->crud->addColumn([
                                'label'     => 'Induk',
                                'type'      => 'select',
                                'name'      => 'product_id',
                                //'entity'    => 'parent',
                                'attribute' => 'title',
                                'model'     => "App\Models\Product",
                            ]);*/
    }

    public function create($id = null, $template = false)
    {
        $this->addDefaultPageFields($template);
        $this->useTemplate($template);

        return parent::create();
    }

    public function store(StoreRequest $request, $id = null, $template = false)
    {
        $this->addDefaultPageFields(\Request::input('template'));
        $this->useTemplate(\Request::input('template'));
        $request['product_id'] = $id;

        return parent::storeCrud($request);
    }

    public function edit($product_id = null, $id = null, $template = false)
    {
        if ($template == false) {
            $model = $this->crud->model;
            $this->data['entry'] = $model::findOrFail($id);
            $template = $this->data['entry']->template;
        }
        $this->addDefaultPageFields($template);
        $this->useTemplate($template);
        //dd($template);

        return parent::edit($id);
    }

    public function update(UpdateRequest $request, $id)
    {
        //dd($request->all());
        $this->addDefaultPageFields(\Request::input('template'));
        $this->useTemplate(\Request::input('template'));
        $request['product_id'] = $id;

        return parent::updateCrud();
    }
    
    public function destroy($product_id = null, $id = null)
    {
        return parent::destroy($id);;
    }

    public function addDefaultPageFields($template = false)
    {
        $this->crud->addField([
                                'name'        => 'template',
                                'label'       => 'Template',
                                'type'        => 'select_page_template',
                                'options'     => $this->getTemplatesArray(),
                                'value'       => $template,
                                'allows_null' => false,
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-6',
                                ],
                            ]);
        $this->crud->addField([    // TEXT
                                'name' => 'name',
                                'label' => 'Nama',
                                'type' => 'text',
                                'placeholder' => 'Judul Anda Di sini',
                            ]);
    }

    public function useTemplate($template_name = false)
    {
        
        $templates = $this->getTemplates();

        // set the default template
        if ($template_name == false) {
            $template_name = $templates[0]->name;
        }

        // actually use the template
        if ($template_name) {
            $this->{$template_name}();
        }
    }

    /**
     * Get all defined templates.
     */
    public function getTemplates()
    {
        $templates_array = [];

        $templates_trait = new \ReflectionClass('App\Traits\TipeMediaTrait');
        $templates = $templates_trait->getMethods();

        if (! count($templates)) {
            abort('403', 'Tidak ada template yang ditemukan.');
        }

        return $templates;
    }

    /**
     * Get all defined template as an array.
     *
     * Used to populate the template dropdown in the create/update forms.
     */
    public function getTemplatesArray()
    {
        $templates = $this->getTemplates();

        foreach ($templates as $template) {
            $templates_array[$template->name] = $this->crud->makeLabel($template->name);
        }

        return $templates_array;
    }

    /*public function show($id)
    {
        return parent::show($this->request->product);
    }

    public function listRevisions($id)
    {
        return parent::listRevisions($this->request->product);
    }

    public function restoreRevision($id)
    {
        return parent::restoreRevision($this->request->product);
    }

    public function showDetailsRow($id)
    {
        return parent::showDetailsRow($this->request->product);
    }*/
    

}
