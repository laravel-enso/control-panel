<?php

namespace LaravelEnso\ControlPanel\App\DTOs;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use LaravelEnso\ControlPanel\App\Contracts\Group as Contract;

class Group implements Contract
{
    private $id;
    private string $label;
    private array $statistics;
    private int $order;

    public function __construct($id, $label, array $statistics, $order = 0)
    {
        $this->id = $id;
        $this->label = $label;
        $this->statistics = $statistics;
        $this->order = $order;
    }

    public function id()
    {
        return $this->id;
    }

    public function label(): string
    {
        return $this->label;
    }

    public function statistics(): Collection
    {
        return (new Collection($this->statistics))
            ->map(fn ($stat) => is_string($stat) ? App::make($stat) : $stat);
    }

    public function order(): int
    {
        return $this->order;
    }
}
