<?php

use LaravelEnso\Core\app\Classes\StructureManager\StructureMigration;

class CreateStructureForAppStatisticsClient extends StructureMigration
{
    protected $permissionsGroup = [
        'name' => 'statistics', 'description' => 'App Statistics Client Group',
    ];

    protected $permissions = [
        ['name' => 'statistics.index', 'description' => 'Statistics index', 'type' => 0],
        ['name' => 'statistics.create', 'description' => 'Create Statistic', 'type' => 1],
        ['name' => 'statistics.destroy', 'description' => 'Delete Statistic', 'type' => 1],
        ['name' => 'statistics.edit', 'description' => 'Edit Statistic', 'type' => 0],
        ['name' => 'statistics.store', 'description' => 'Store Statistic', 'type' => 1],
        ['name' => 'statistics.update', 'description' => 'Update Statistic', 'type' => 0],
        ['name' => 'statistics.show', 'description' => 'Temp for Statistic', 'type' => 0],
        ['name' => 'statistics.get', 'description' => 'Get specific metric', 'type' => 0],
        ['name' => 'statistics.getAll', 'description' => 'Get all possible metrics for one app', 'type' => 0],
        ['name' => 'statistics.getConsolidated', 'description' => 'Get all metrics for all apps', 'type' => 0],
        ['name' => 'statistics.clearLaravelLog', 'description' => 'Clear laravel log for one app', 'type' => 1],
    ];

    protected $menu = [
        'name' => 'Statistics', 'icon' => 'fa fa-fw fa-stethoscope', 'link' => 'statistics', 'has_children' => 0,
    ];

    protected $parentMenu = '';
}
