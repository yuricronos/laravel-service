<?php

namespace Yuricronos\LaravelService;

use Illuminate\Support\ServiceProvider;
use Yuricronos\LaravelService\Console\MakeServiceCommand;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->commands([MakeServiceCommand::class]);

            $source = realpath($raw = __DIR__ . '/../config/lrvlsrvce.php') ?: $raw;
            $this->publishes([$source => $this->app->configPath('lrvlsrvce.php')]);
            $this->mergeConfigFrom($source, 'lrvlsrvce');

            $appRoot = config('lrvlsrvce.app_root');
            if (!empty($appRoot)) {
                $path = sprintf("/%s%s", $appRoot, config('lrvlsrvce.livewire_update'));
                Livewire::setUpdateRoute(fn ($handle) => Route::post($path, $handle));
            }

            // this function is only used for the personalized laravel boilerplate 
            BladeDirective::createDirective();

            URL::forceRootUrl(config('lrvlsrvce.app_url'));
            if (str_contains(config('lrvlsrvce.app_url'), 'https://')) {
                URL::forceScheme('https');
            }
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
