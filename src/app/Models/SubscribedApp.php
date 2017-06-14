<?php

namespace LaravelEnso\AppStatisticsClient\app\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\TrackWho\app\Traits\CreatedBy;
use LaravelEnso\TrackWho\app\Traits\UpdatedBy;

class SubscribedApp extends Model
{
    use CreatedBy, UpdatedBy;

    protected $fillable = ['url', 'client_id', 'secret', 'token', 'name', 'description'];
    protected $hidden = ['secret','token'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
