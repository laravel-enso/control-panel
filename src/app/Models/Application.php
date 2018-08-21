<?php

namespace LaravelEnso\ControlPanel\app\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
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
