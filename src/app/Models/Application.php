<?php

namespace LaravelEnso\ControlPanel\App\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\App\Traits\TableCache;

class Application extends Model
{
    use TableCache;

    protected $fillable = ['name', 'description', 'url', 'type', 'token', 'order_index'];

    protected $hidden = ['token'];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];

    public function scopeOrdered($query)
    {
        $query->orderBy('order_index');
    }
}
