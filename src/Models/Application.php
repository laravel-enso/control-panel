<?php

namespace LaravelEnso\ControlPanel\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\ControlPanel\Contracts\LegacyApi;
use LaravelEnso\ControlPanel\Enums\ApplicationTypes;
use LaravelEnso\ControlPanel\Services\Application\Link as ApplicationLink;
use LaravelEnso\ControlPanel\Services\Enso\Enso;
use LaravelEnso\ControlPanel\Services\Enso\Legacy;
use LaravelEnso\ControlPanel\Services\Envoyer\Link as EnvoyerLink;
use LaravelEnso\ControlPanel\Services\Forge\Link as ForgeLink;
use LaravelEnso\ControlPanel\Services\Gitlab\Api as GitlabApi;
use LaravelEnso\ControlPanel\Services\Sentry\Api as SentryApi;
use LaravelEnso\Files\Http\Resources\Collection;
use LaravelEnso\Helpers\Traits\ActiveState;
use LaravelEnso\Tables\Traits\TableCache;

class Application extends Model
{
    use ActiveState, TableCache;

    protected $guarded = ['id'];

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

    public function api(array $request): LegacyApi
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
        // return [
        //     new ForgeLink($this), new EnvoyerLink($this), new ApplicationLink($this),
        // ];

        return (new Collection([new ApplicationLink($this)]))
            ->when($this->forge_url, fn ($links) => $links->push(new ForgeLink($this)))
            ->when($this->envoyer_url, fn ($links) => $links->push(new EnvoyerLink($this)))
            ->toArray();
    }
}
