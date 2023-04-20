<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Controllers\Admin\WidgetCrudController;

class SetsidebarCrudController extends WidgetCrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("App\Models\Dynamic");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'kaltara').'/setting-sidebar');
        $this->crud->setEntityNameStrings('sidebar', 'sidebar');

    }

    public function index()
    {
        $this->crud->addClause('where', 'position', 'sidebar');

        return parent::index();
    }

    
}
