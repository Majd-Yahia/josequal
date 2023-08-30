<?php

namespace App\Livewire\Web;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class AboutUs extends Component
{

    public function render(): View
    {
        return view('livewire.web.about-us')->layout('components.layouts.web');
    }
}
