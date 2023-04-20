<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Controllers\Admin\WidgetCrudController;

class SetfooterCrudController extends WidgetCrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("App\Models\Dynamic");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'amartha').'/setting-footer');
        $this->crud->setEntityNameStrings('footer', 'footer');
    }

    public function index()
    {
        $this->crud->addClause('where', 'position', 'footer');

        return parent::index();
    }
}
