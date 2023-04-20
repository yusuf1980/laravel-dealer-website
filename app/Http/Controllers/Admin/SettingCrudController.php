<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SettingRequest as StoreRequest;
use App\Http\Requests\SettingRequest as UpdateRequest;

class SettingCrudController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->middleware(['permission:manage pengaturan']);

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Setting");
        //$this->crud->setRoute("admin/setting");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'kaltara') . '/setting');
        $this->crud->setEntityNameStrings('setting', 'settings');
        $this->crud->denyAccess(['create', 'delete']);
        $this->crud->setColumns([
            [
                'name'  => 'name',
                'label' => trans('backpack::settings.name'),
            ],
            /*[
                'name'  => 'value',
                'label' => trans('backpack::settings.value'),
            ],*/
            [
                'name'  => 'description',
                'label' => trans('backpack::settings.description'),
            ],
        ]);
        $this->crud->addField([
            'name'       => 'name',
            'label'      => trans('backpack::settings.name'),
            'type'       => 'text',
            'attributes' => [
                'disabled' => 'disabled',
            ],
        ]);
    }

    public function index()
    {
        $this->crud->addClause('where', 'active', 1);

        return parent::index();
    }

	public function store(StoreRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}

     public function edit($id)
    {
        $this->crud->hasAccessOrFail('update');

        $this->data['entry'] = $this->crud->getEntry($id);
        $this->crud->addField((array) json_decode($this->data['entry']->field)); // <---- this is where it's different
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getUpdateFields($id);
        $this->data['title'] = trans('backpack::crud.edit').' '.$this->crud->entity_name;

        $this->data['id'] = $id;

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getEditView(), $this->data);
    }

	public function update(UpdateRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}
}
