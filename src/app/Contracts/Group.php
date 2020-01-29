<?php

namespace LaravelEnso\ControlPanel\App\Contracts;

use Illuminate\Support\Collection;

interface Group
{
    public function id();

    public function label(): string;

    public function statistics(): Collection;

    public function order(): int;
}
