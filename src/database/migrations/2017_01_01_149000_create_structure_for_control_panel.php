<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForControlPanel extends Migration
{
    protected $permissions = [
        ['name' => 'controlPanel.index', 'description' => 'General view', 'is_default' => false],
        ['name' => 'controlPanel.statistics', 'description' => 'Get metrics for an application', 'is_default' => false],
        ['name' => 'controlPanel.actions', 'description' => 'Get actions for an application', 'is_default' => false],
        ['name' => 'controlPanel.action', 'description' => 'Do action for an application', 'is_default' => false],
        ['name' => 'controlPanel.gitlab', 'description' => 'Get metrics for gitlab of an application', 'is_default' => false],
        ['name' => 'controlPanel.sentry', 'description' => 'Get metrics for sentry of an application', 'is_default' => false],
    ];
}
