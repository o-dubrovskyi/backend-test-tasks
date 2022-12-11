<?php

namespace App\Providers;

use App\Services\CurlService;
use App\Services\CurrencyInfoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $appConfig = config('app');

        $this->app->singleton(CurlService::class, function () {
            return new CurlService();
        });

        $this->app->singleton(CurrencyInfoService::class, function ($app) use ($appConfig) {
            return new CurrencyInfoService(
                $appConfig['currency'],
                $app->get(CurlService::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
