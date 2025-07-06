<?php

namespace Modules\Task\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Modules\Task\Policies\TaskPolicy;
use Modules\Task\Models\Task;

class TaskServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../Views', 'task');

        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'task');

        Gate::policy(Task::class, TaskPolicy::class);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\Modules\Task\Interfaces\TaskRepositoryInterface::class, \Modules\Task\Repositories\TaskRepository::class);
    }
}
