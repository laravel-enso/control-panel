<?php

namespace LaravelEnso\ControlPanel\App\Contracts;

interface Link
{
    public function id();

    public function label(): string;

    public function url(): string;

    public function tooltip(): ?string;

    public function description(): ?string;

    public function icon();

    public function order(): int;
}
