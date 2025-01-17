<?php

namespace App\Livewire\Landing\Section;

use Livewire\Component;

class Hero extends Component
{
    public function render()
    {
        return view('livewire.landing.section.hero');
    }

    public function getImages(): array
    {
        return [
            asset('images/fresh-fish1.jpeg'),
            asset('images/fresh-fish2.jpeg'),
            asset('images/fresh-fish3.jpeg')
        ];
    }

    public function scrollToSection($sectionId)
    {
        $this->dispatchBrowserEvent('scrollToSection', $sectionId);
    }
}
