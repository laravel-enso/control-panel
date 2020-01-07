<?php

namespace LaravelEnso\ControlPanel\App\Enums;

use LaravelEnso\Enums\App\Services\Enum;

class DataTypes extends Enum
{
    public const Logins = 'logins';
    public const Actions = 'actions';
    public const FailedJobs = 'failed jobs';
    public const Sessions = 'sessions';
    public const Users = 'users';
    public const ActiveUsers = 'active users';
    public const NewUsers = 'new users';
    public const ServerTime = 'server time';
    public const Version = 'version';
    public const LogSize = 'log size';
    public const Status = 'status';
}
