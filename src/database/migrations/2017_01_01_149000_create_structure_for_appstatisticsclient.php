<?php

use LaravelEnso\Core\app\Classes\StructureManager\StructureMigration;

class CreateStructureForAppStatisticsClient extends StructureMigration
{
    protected $permissionsGroup = [
        'name' => 'statistics', 'description' => 'App Statistics Client Group',
    ];

    protected $permissions = [
        ['name' => 'statistics.index', 'description' => 'Statistics index', 'type' => 0],
        ['name' => 'statistics.subscribeToApp', 'description' => 'Subscribe to an application', 'type' => 0],
        ['name' => 'statistics.run', 'description' => 'Run Statistic', 'type' => 1],
        ['name' => 'statistics.destroy', 'description' => 'Delete Statistic', 'type' => 1],
        ['name' => 'statistics.download', 'description' => 'Download Statistic', 'type' => 0],
        ['name' => 'statistics.initTable', 'description' => 'Init Table for Statistic', 'type' => 0],
        ['name' => 'statistics.getTableData', 'description' => 'Table Data for Statistic', 'type' => 0],
        ['name' => 'statistics.getSummary', 'description' => 'Summary for Statistic', 'type' => 0],
    ];

    protected $menu = [
        'name' => 'Statistics', 'icon' => 'fa fa-fw fa-stethoscope', 'link' => 'statistics', 'has_children' => 0,
    ];

    protected $parentMenu = '';
}
