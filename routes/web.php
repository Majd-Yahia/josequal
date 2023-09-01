<?php

use App\Http\Controllers\Web\PagesController;
use App\Livewire\Web\AboutUs;
use App\Livewire\Web\ContactUs;
use App\Livewire\Web\Index;
use App\Livewire\Web\Service;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::as('web.')->group(function () {
    Route::get('/', Index::class)->name('index');
});
