<?php

namespace pdaleramirez\asymmetric\encryption;

use Illuminate\Support\ServiceProvider;

class AsymmetricEncryptionProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(AsymmetricEncryptionFacade::getFacadeAccessor(), function ($app) {
            return new AsymmetricEncryptionService();
        });
    }
}
