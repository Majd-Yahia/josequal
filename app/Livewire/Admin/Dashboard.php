<?php

namespace App\Livewire\Admin;

use Google\Cloud\Storage\StorageClient;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Dashboard extends Component
{

    public function makeApiRequest()
    {

        // Example 2: GET request
        // $response = Http::get('https://mapsplatformdatasets.googleapis.com/v1/josequal-397616/datasets');

        // Handle the response as needed
        return response()->json($data);
    }

    public function render(): View
    {
        // $this->makeApiRequest();



        return view('livewire.admin.dashboard')->layout('components.layouts.admin');
    }
}
