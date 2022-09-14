<?php

namespace Asset1996\Posts\Providers;

use Asset1996\Posts\Console\Commands\PostCommand;
use Illuminate\Support\ServiceProvider;

class PostsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'posts');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/posts'),
        ]);

        $this->publishes([
            __DIR__.'/../config/posts.php' => config_path('posts.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                PostCommand::class
            ]);
        }
    }
}
