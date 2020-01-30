<?php

namespace LaravelEnso\ControlPanel\App\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\ControlPanel\App\Contracts\BaseApi;
use LaravelEnso\ControlPanel\App\Enums\ApplicationTypes;
use LaravelEnso\ControlPanel\App\Services\Enso\Enso;
use LaravelEnso\ControlPanel\App\Services\Enso\Legacy;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Api as GitlabApi;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Envoyer;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Forge;
use LaravelEnso\ControlPanel\App\Services\Gitlab\Site;
use LaravelEnso\ControlPanel\App\Services\Sentry\Api as SentryApi;
use LaravelEnso\Helpers\app\Traits\ActiveState;
use LaravelEnso\Tables\App\Traits\TableCache;

class Application extends Model
{
    use ActiveState, TableCache;

    protected $fillable = [
        'name', 'description', 'url', 'type', 'token', 'order_index',
        'envoyer_url', 'forge_url', 'gitlab_project_id', 'sentry_project_uri',
        'is_active',
    ];

    protected $hidden = ['token'];

    protected $casts = [
        'is_active' => 'boolean', 'created_at' => 'datetime:d-m-Y',
    ];

    public function scopeOrdered($query)
    {
        $query->orderBy('order_index');
    }

    public function scopeActive($query)
    {
        $query->whereIsActive(1);
    }

    public function baseApi(array $request): BaseApi
    {
        return $this->type === ApplicationTypes::Enso
            ? new Enso($this, $request)
            : new Legacy($this, $request);
    }

    public function sentryApi(): SentryApi
    {
        return new SentryApi($this);
    }

    public function gitlabApi(): GitlabApi
    {
        return new GitlabApi($this);
    }

    public function links(): array
    {
        return [
            new Forge($this), new Envoyer($this), new Site($this),
        ];
    }
}
