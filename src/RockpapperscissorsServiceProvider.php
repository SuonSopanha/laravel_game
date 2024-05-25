<?php

namespace Gameaaa\Agroupnine;

use Illuminate\Support\ServiceProvider;

class RockpapperscissorsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views','game');
        $this->loadMigrationsFrom(__DIR__.'/../databases/migrations','game');

    }
}
