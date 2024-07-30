<?php

namespace Yuricronos\LaravelService;

use Yuricronos\LaravelService\Console\MakeServiceCommand;
use Yuricronos\LaravelService\Services\ApiService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\Facades\URL;
use Yuricronos\LaravelService\Features\Livewire\SupportLivewireManager;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app instanceof LaravelApplication) {
            if ($this->app->runningInConsole()) {
                $this->commands([MakeServiceCommand::class]);
            }

            $source = realpath($raw = __DIR__ . '/../config/lrvlsrvce.php') ?: $raw;
            $this->publishes([$source => $this->app->configPath('lrvlsrvce.php')]);
            $this->mergeConfigFrom($source, 'lrvlsrvce');

            $appRoot = config('lrvlsrvce.app_root');
            SupportLivewireManager::buildRouting($appRoot);

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
        $this->app->singleton(ApiService::class, fn ($app) => new ApiService());
    }
}
