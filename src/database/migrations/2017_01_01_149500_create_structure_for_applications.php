<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForApplications extends StructureMigration
{
    protected $permissionGroup = [
        'name' => 'administration.applications', 'description' => 'Applications Permission Group',
    ];

    protected $permissions = [
        ['name' => 'administration.applications.initTable', 'description' => 'Init table for applications', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.applications.getTableData', 'description' => 'Get table data for applications', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.applications.exportExcel', 'description' => 'Export excel for applications', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.applications.index', 'description' => 'Control Panel index', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.applications.create', 'description' => 'Create application', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.applications.destroy', 'description' => 'Delete application', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.applications.edit', 'description' => 'Edit application', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.applications.store', 'description' => 'Store application', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.applications.update', 'description' => 'Update application', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Applications', 'icon' => 'stethoscope', 'link' => 'administration.applications.index', 'order_index' => 100, 'has_children' => false,
    ];

    protected $parentMenu = 'Administration';
}
