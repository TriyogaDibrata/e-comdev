<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Joaopaulolndev\FilamentGeneralSettings\Services\GeneralSettingsService;

class Header extends Component
{
    protected $generalSettingsService;

    /**
     * Create a new component instance.
     */
    public function __construct(GeneralSettingsService $generalSettingsService)
    {
        $this->generalSettingsService = $generalSettingsService;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $general = $this->generalSettingsService->get();
        return view('components.layouts.partials.header', ['general' => $general]);
    }
}
