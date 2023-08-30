<?php

namespace App\Livewire\Web;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class ContactUs extends Component
{

    public function render(): View
    {
        return view('livewire.web.contact-us')->layout('components.layouts.web');
    }
}
