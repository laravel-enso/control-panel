<?php

use LaravelEnso\Migrator\app\Database\Migration;

class CreateStructureForApplications extends Migration
{
    protected $permissions = [
        ['name' => 'administration.applications.initTable', 'description' => 'Init table for applications', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.applications.tableData', 'description' => 'Get table data for applications', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.applications.exportExcel', 'description' => 'Export excel for applications', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.applications.index', 'description' => 'Control Panel index', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.applications.create', 'description' => 'Create application', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.applications.destroy', 'description' => 'Delete application', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.applications.edit', 'description' => 'Edit application', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.applications.store', 'description' => 'Store application', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.applications.update', 'description' => 'Update application', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Applications', 'icon' => 'stethoscope', 'route' => 'administration.applications.index', 'order_index' => 100, 'has_children' => false,
    ];

    protected $parentMenu = 'Administration';
}
