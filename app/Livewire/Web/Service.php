<?php

namespace App\Livewire\Web;

use App\Repository\Service\ServiceRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Service extends Component
{
    protected ServiceRepository $repository;

    public function __construct()
    {
        $this->repository = app(ServiceRepository::class);
    }

    public function render(): View
    {
        $services = $this->repository->getListWithFilters();
        return view('livewire.web.services', [
            'services' => $services,
        ])->layout('components.layouts.web');
    }
}
