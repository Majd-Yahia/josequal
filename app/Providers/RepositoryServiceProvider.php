<?php

namespace App\Providers;

use App\Repository\Service\ServiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $classesToRegister = [
        ServiceRepository::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        foreach ($this->classesToRegister as $class) {
            $this->app->bind($class, function ($app) use ($class) {
                return new $class();
            });
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
