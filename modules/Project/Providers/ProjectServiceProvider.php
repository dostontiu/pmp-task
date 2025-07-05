<?php

namespace Modules\Project\Providers;

use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Load migrations for this module
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        // Load views and assign namespace 'order'
        $this->loadViewsFrom(__DIR__ . '/../Views', 'project');

        // Merge configuration files
//        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'project');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(\Modules\Project\Interfaces\ProjectRepositoryInterface::class, \Modules\Project\Repositories\ProjectRepository::class);
    }
}
