<?php

namespace App\Livewire\Landing\Section;

use Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting;
use Joaopaulolndev\FilamentGeneralSettings\Services\GeneralSettingsService;
use Livewire\Component;

class About extends Component
{
    public $general;

    public function mount(GeneralSettingsService $generalSettingsService)
    {
        // Fetch general settings using the service
        $this->general = $generalSettingsService->get();
    }

    public function render()
    {
        return view('livewire.landing.section.about', [
            'general' => $this->general,
        ]);
    }
}
