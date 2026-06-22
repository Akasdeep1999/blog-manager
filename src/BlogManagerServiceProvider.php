<?php

namespace Digitechbranz\BlogManager;

use Illuminate\Support\ServiceProvider;

class BlogManagerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/blog-manager.php',
            'blog-manager'
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../resources/views',
            'blog-manager'
        );

        $this->loadMigrationsFrom(
            __DIR__ . '/../database/migrations'
        );

        $this->publishes([
            __DIR__ . '/../config/blog-manager.php' =>
            config_path('blog-manager.php'),
        ], 'blog-manager-config');

        $this->publishes([
            __DIR__ . '/../resources/views' =>
            resource_path('views/vendor/blog-manager'),
        ], 'blog-manager-views');

        $this->publishes([
            __DIR__ . '/../database/migrations' =>
            database_path('migrations'),
        ], 'blog-manager-migrations');
    }
}
