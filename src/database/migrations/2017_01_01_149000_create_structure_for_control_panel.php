<?php

use LaravelEnso\Migrator\App\Database\Migration;
use LaravelEnso\Permissions\app\Enums\Types;

class CreateStructureForControlPanel extends Migration
{
    protected $permissions = [
        ['name' => 'controlPanel.index', 'description' => 'General view', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'controlPanel.statistics', 'description' => 'Get metrics for an application', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'controlPanel.actions', 'description' => 'Get actions for an application', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'controlPanel.action', 'description' => 'Do action for an application', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'controlPanel.gitlab', 'description' => 'Get metrics for gitlab of an application', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'controlPanel.sentry', 'description' => 'Get metrics for sentry of an application', 'type' => Types::Read, 'is_default' => false],
    ];
}
