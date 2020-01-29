<?php

namespace LaravelEnso\ControlPanel\App\DTOs;

use LaravelEnso\ControlPanel\App\Contracts\Link as Contract;

class Link implements Contract
{
    private $id;
    private string $label;
    private string $url;
    private $icon;
    private ?string $tooltip;
    private ?string $description;
    private int $order;

    public function __construct($id, $label, $url, $icon, $tooltip = null, $description = null, int $order = 0)
    {
        $this->id = $id;
        $this->label = $label;
        $this->url = $url;
        $this->icon = $icon;
        $this->tooltip = $tooltip;
        $this->description = $description;
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

    public function url(): string
    {
        return $this->url;
    }

    public function icon()
    {
        return $this->icon;
    }

    public function tooltip(): ?string
    {
        return $this->tooltip;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function order(): int
    {
        return $this->order;
    }
}
