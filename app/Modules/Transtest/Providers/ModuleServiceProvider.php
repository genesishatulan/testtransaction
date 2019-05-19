<?php

namespace App\Modules\Transtest\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('transtest', 'Resources/Lang', 'app'), 'transtest');
        $this->loadViewsFrom(module_path('transtest', 'Resources/Views', 'app'), 'transtest');
        $this->loadMigrationsFrom(module_path('transtest', 'Database/Migrations', 'app'), 'transtest');
        $this->loadConfigsFrom(module_path('transtest', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('transtest', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
