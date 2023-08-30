<?php

use App\Http\Controllers\Admin\AuthController;

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\ForgotPassword;
use App\Livewire\Admin\Login;
use App\Livewire\Admin\PasswordReset;
use App\Livewire\Admin\Profile;
use App\Livewire\Admin\Services\ServicesList;
use App\Livewire\Admin\Roles\RolesList;
use App\Livewire\Admin\Users\UsersList;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/forgot-password', ForgotPassword::class)->name('password.forgot');
    Route::get('/password-reset/{token}/{email}', PasswordReset::class)->name('password.reset');
});

Route::prefix('admin')->as('admin.')->group(function () {
    Route::middleware('auth')->group(function () {

        // Route Actions
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        //Livewire Full Page
        Route::get('/', Dashboard::class)->name('dashboard');
        Route::get('/profile', Profile::class)->name('profile');

        Route::prefix('users')->as('users.')->group(function () {
            Route::get('/', UsersList::class)->name('index');
        });

        Route::prefix('services')->as('services.')->group(function () {
            Route::get('/', ServicesList::class)->name('index');
        });

        Route::prefix('roles')->as('roles.')->group(function () {
            Route::get('/', RolesList::class)->name('index');
        });
    });
});
