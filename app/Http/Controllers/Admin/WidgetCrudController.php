<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\DynamicRequest as StoreRequest;
use App\Http\Requests\DynamicRequest as UpdateRequest;
use App\Widgets;
use App\Models\Dynamic;

class WidgetCrudController extends CrudController
{
    use Widgets;

    public function __construct()
    {
        parent::__construct();

        $this->middleware(['permission:manage pengaturan']);

        $this->crud->denyAccess(['create', 'delete']);
        

        
        $this->crud->setColumns([
            [
                'name'  => 'name',
                'label' => 'nama',
            ],
            [
                'name'  => 'title',
                'label' => 'Judul',
            ],
            [
                'name'  => 'widget',
                'label' => 'Widget',
            ],
            [
                'name'  => 'position',
                'label' => 'Posisi',
            ],
        ]);
        
    }

    public function index()
    {
        $this->crud->addClause('where', 'active', 1);

        return parent::index();
    }

    // Overwrites the CrudController edit() method to add template usage.
    public function edit($id, $widget = false)
    {
        //$this->crud->removeButtonFromStack('save_and_new','bottom');
        // if the template in the GET parameter is missing, figure it out from the db
        if ($widget == false) {
            $model = $this->crud->model;
            $this->data['entry'] = $model::findOrFail($id);
            $widget = $this->data['entry']->widget;
        }
        $this->addDefaultPageFields($widget);
        $this->useWidget($widget);

        return parent::edit($id);
    }

	public function update(StoreRequest $request)
	{
		$this->addDefaultPageFields($request->input('widget'));
        $this->useWidget($request->input('widget'));

        return parent::updateCrud();
	}

	public function addDefaultPageFields()
    {
    	$this->crud->addField([
            'name'        => 'widget',
            'label'       => 'Widget',
            'type'        => 'hidden',
		]);		            
    	$this->crud->addField([
            'name'       => 'name',
            'label'      => 'Nama',
            'type'       => 'text',
            'attributes' => [
                'disabled' => 'disabled',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
        $this->crud->addField([
            'name'       => 'title',
            'label'      => 'Judul',
            'type'       => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6',
            ],
        ]);
    }

    public function useWidget($widget_name = false)
    {
        $widgets = $this->getWidgets();

        // set the default template
        if ($widget_name == false) {
            $widget_name = $widgets[0]->name;
        }

        // actually use the template
        if ($widget_name) {
            $test = $this->{$widget_name}();
        }
    }

    public function getWidgets()
    {
        $widgets_array = [];

        $widgets_trait = new \ReflectionClass('App\Widgets');
        $widgets = $widgets_trait->getMethods();

        if (! count($widgets)) {
            abort('403', 'Tidak ada widget yang ditemukan.');
        }

        return $widgets;
    }
}
