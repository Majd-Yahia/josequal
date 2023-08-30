<?php

namespace App\Livewire\Web;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Index extends Component
{

    public function render(): View
    {
        return view('livewire.web.index')->layout('components.layouts.web');
    }
}
