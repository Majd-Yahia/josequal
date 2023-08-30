<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentColor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // FilamentColor::register([
        //     'primary' =>  Color::hex('#02BCE2'), // primary color
        //     'secondary' => Color::hex('#012D47'), // scondary color
        // ]);
        FilamentColor::register([
            'primary' => [
                50 => '#E6F9FF',
                100 => '#C0E4F7',
                200 => '#96CFF0',
                300 => '#6DB9E9',
                400 => '#44A4E2',
                500 => '#02BCE2',
                600 => '#00A4C7',
                700 => '#008AA5',
                800 => '#006982',
                900 => '#004F60',
            ],
            'secondary' => [
                50 => '#F3F7F9',
                100 => '#E0E8ED',
                200 => '#CEDAE0',
                300 => '#BBCDD2',
                400 => '#A8C0C5',
                500 => '#012D47',
                600 => '#00456B',
                700 => '#005C8E',
                800 => '#0074B2',
                900 => '#008BD5',
            ],
        ]);
    }
}
