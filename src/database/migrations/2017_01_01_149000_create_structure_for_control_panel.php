<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForControlPanel extends Migration
{
    protected $permissions = [
        ['name' => 'controlPanel.statistics', 'description' => 'Get metrics for an application', 'type' => 0, 'is_default' => false],
        ['name' => 'controlPanel.clearLog', 'description' => 'Clear Laravel log for an application', 'type' => 1, 'is_default' => false],
        ['name' => 'controlPanel.maintenance', 'description' => 'Toggle maintenance mode for an application', 'type' => 1, 'is_default' => false],
    ];
}
