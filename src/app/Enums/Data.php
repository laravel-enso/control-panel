<?php

namespace LaravelEnso\ControlPanel\App\Enums;

use LaravelEnso\Enums\App\Services\Enum;

class Data extends Enum
{
    public const Logins = 'logins';
    public const Actions = 'actions';
    public const FailedJobs = 'failed jobs';
    public const Jobs = 'jobs';
    public const Horizon = 'horizon';
    public const Sessions = 'sessions';
    public const Users = 'users';
    public const ActiveUsers = 'active users';
    public const NewUsers = 'new users';
    public const ServerTime = 'server time';
    public const Version = 'version';
    public const PhpVersion = 'php version';
    public const LogSize = 'log size';
    public const Status = 'status';
    public const QueueSize = 'queue size';
    public const MysqlVersion = 'mysql version';
    public const Schedule = 'schedule';
    public const Memory = 'memory';
    public const Disk = 'disk';
    public const Load = 'load';
}
