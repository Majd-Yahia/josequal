<?php

namespace App\Livewire\Admin;

use App\Repository\Files\FilesRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(FilesRepository $repository): View
    {
        $url = $repository->getDefaultKMLUrl();
        return view('livewire.admin.dashboard', ['url' => $url])->layout('components.layouts.admin');
    }
}
