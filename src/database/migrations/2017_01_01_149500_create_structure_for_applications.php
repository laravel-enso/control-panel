<?php

use LaravelEnso\Migrator\App\Database\Migration;
use LaravelEnso\Permissions\App\Enums\Types;

class CreateStructureForApplications extends Migration
{
    protected $permissions = [
        ['name' => 'administration.applications.initTable', 'description' => 'Init table for applications', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.applications.tableData', 'description' => 'Get table data for applications', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.applications.exportExcel', 'description' => 'Export excel for applications', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.applications.index', 'description' => 'Control Panel index', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.applications.create', 'description' => 'Create application', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.applications.destroy', 'description' => 'Delete application', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.applications.edit', 'description' => 'Edit application', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.applications.store', 'description' => 'Store application', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.applications.update', 'description' => 'Update application', 'type' => Types::Read, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Applications', 'icon' => 'stethoscope', 'route' => 'administration.applications.index', 'order_index' => 100, 'has_children' => false,
    ];

    protected $parentMenu = 'Administration';
}
