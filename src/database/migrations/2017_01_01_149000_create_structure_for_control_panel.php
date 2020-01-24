<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForControlPanel extends Migration
{
    protected $permissions = [
        ['name' => 'controlPanel.index', 'description' => 'General view', 'type' => 0, 'is_default' => false],
        ['name' => 'controlPanel.statistics', 'description' => 'Get metrics for an application', 'type' => 0, 'is_default' => false],
        ['name' => 'controlPanel.actions', 'description' => 'Get actions for an application', 'type' => 0, 'is_default' => false],
        ['name' => 'controlPanel.action', 'description' => 'Do action for an application', 'type' => 1, 'is_default' => false],
        ['name' => 'controlPanel.gitlab', 'description' => 'Get metrics for gitlab of an application', 'type' => 0, 'is_default' => false],
        ['name' => 'controlPanel.sentry', 'description' => 'Get metrics for sentry of an application', 'type' => 0, 'is_default' => false],
    ];
}
