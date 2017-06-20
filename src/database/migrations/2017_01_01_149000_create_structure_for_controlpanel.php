<?php

use LaravelEnso\Core\app\Classes\StructureManager\StructureMigration;

class CreateStructureForControlPanel extends StructureMigration
{

    protected $permissionsGroup = [
        'name' => 'controlPanel', 'description' => 'Control Panel Group',
    ];

    protected $permissions = [
        ['name' => 'controlPanel.index', 'description' => 'Control Panels index', 'type' => 0, 'default' => false],
        ['name' => 'controlPanel.create', 'description' => 'Create Control Panel', 'type' => 1, 'default' => false],
        ['name' => 'controlPanel.destroy', 'description' => 'Delete Control Panel', 'type' => 1, 'default' => false],
        ['name' => 'controlPanel.edit', 'description' => 'Edit Control Panel', 'type' => 0, 'default' => false],
        ['name' => 'controlPanel.store', 'description' => 'Store Control Panel', 'type' => 1, 'default' => false],
        ['name' => 'controlPanel.update', 'description' => 'Update Control Panel', 'type' => 0, 'default' => false],
        ['name' => 'controlPanel.show', 'description' => 'Temp for Control Panel', 'type' => 0, 'default' => false],
        ['name' => 'controlPanel.get', 'description' => 'Get metrics for one app', 'type' => 0, 'default' => false],
        ['name' => 'controlPanel.getAll', 'description' => 'Get all possible metrics for one app', 'type' => 0, 'default' => false],
        ['name' => 'controlPanel.clearLaravelLog', 'description' => 'Clear laravel log for one app', 'type' => 1, 'default' => false],
        ['name' => 'controlPanel.setMaintenanceMode', 'description' => 'Set maintenance mode for one app', 'type' => 1, 'default' => false],
        ['name' => 'controlPanel.updatePreferences', 'description' => 'Update preferences for one app', 'type' => 1, 'default' => false],
    ];

    protected $menu = [
        'name' => 'Control Panels', 'icon' => 'fa fa-fw fa-stethoscope', 'link' => 'controlPanel', 'has_children' => 0,
    ];

    protected $parentMenu = '';
}
