<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForApplications extends Migration
{
    protected $permissions = [
        ['name' => 'administration.applications.initTable', 'description' => 'Init table for applications', 'is_default' => false],
        ['name' => 'administration.applications.tableData', 'description' => 'Get table data for applications', 'is_default' => false],
        ['name' => 'administration.applications.exportExcel', 'description' => 'Export excel for applications', 'is_default' => false],
        ['name' => 'administration.applications.index', 'description' => 'Control Panel index', 'is_default' => false],
        ['name' => 'administration.applications.create', 'description' => 'Create application', 'is_default' => false],
        ['name' => 'administration.applications.destroy', 'description' => 'Delete application', 'is_default' => false],
        ['name' => 'administration.applications.edit', 'description' => 'Edit application', 'is_default' => false],
        ['name' => 'administration.applications.store', 'description' => 'Store application', 'is_default' => false],
        ['name' => 'administration.applications.update', 'description' => 'Update application', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Applications', 'icon' => 'stethoscope', 'route' => 'administration.applications.index', 'order_index' => 100, 'has_children' => false,
    ];

    protected $parentMenu = 'Administration';
}
