<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SliderRequest as StoreRequest;
use App\Http\Requests\SliderRequest as UpdateRequest;
use App\Traits\FrameSliderTrait;

class SliderCrudController extends CrudController
{
    use FrameSliderTrait;

    public function __construct($template_name = false)
    {
        parent::__construct();

        $this->middleware(['permission:manage sliders']);

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Slider");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'kaltara').'/slider');
        $this->crud->setEntityNameStrings('Slider', 'Sliders');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        //$this->crud->setFromDb();
        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Title',
                            ]);
        $this->crud->addColumn([
                                'name' => 'status',
                                'label' => 'Status',
                            ]);
        $this->crud->addColumn([
                                'name'          => 'template',
                                'type'          => 'model_function',
                                'function_name' => 'getTemplateName',
                                ]);

        //$this->crud->enableAjaxTable();
    }

    public function setup()
    {
        parent::setup();

        $this->crud->orderBy('id', 'desc');
    }

    // Overwrites the CrudController create() method to add template usage.
    public function create($template = false)
    {
        $this->addDefaultPageFields($template);
        $this->useTemplate($template);

        return parent::create();
    }

    // Overwrites the CrudController store() method to add template usage.
    public function store(StoreRequest $request)
    {
        $this->addDefaultPageFields(\Request::input('template'));
        $this->useTemplate(\Request::input('template'));

        return parent::storeCrud();
    }

    // Overwrites the CrudController edit() method to add template usage.
    public function edit($id, $template = false)
    {
        // if the template in the GET parameter is missing, figure it out from the db
        if ($template == false) {
            $model = $this->crud->model;
            $this->data['entry'] = $model::findOrFail($id);
            $template = $this->data['entry']->template;
        }

        $this->addDefaultPageFields($template);
        $this->useTemplate($template);

        return parent::edit($id);
    }

    // Overwrites the CrudController update() method to add template usage.
    public function update(UpdateRequest $request)
    {
        $this->addDefaultPageFields(\Request::input('template'));
        $this->useTemplate(\Request::input('template'));

        return parent::updateCrud();
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
                                'name' => 'title',
                                'label' => 'Title',
                                'type' => 'text',
                                'placeholder' => 'Your title here',
                            ]);
        $this->crud->addField([    // TEXT
                                'name' => 'url',
                                'label' => 'Url',
                                'type' => 'url',
                                //'page_model' => '\App\Models\Page'
                            ]);
        $this->crud->addField([    // ENUM
                                'name' => 'status',
                                'label' => 'Status',
                                'type' => 'enum',
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

        $templates_trait = new \ReflectionClass('App\Traits\FrameSliderTrait');
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
}
