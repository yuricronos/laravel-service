<?php

namespace Yuricronos\LaravelService;

use Illuminate\Support\ServiceProvider;
use Yuricronos\LaravelService\Console\MakeServiceCommand;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeServiceCommand::class
            ]);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // 
    }
}
