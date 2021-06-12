<?php

namespace Bagisto\Currencies\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class CurrenciesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../Http/admin-routes.php');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'currencies');

        $this->publishes([
            __DIR__ . '/../Resources/assets/js/currencies.json' => public_path('currencies.json'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'currencies');

        Event::listen('bagisto.admin.layout.head', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('currencies::admin.layouts.style');
        });

        Event::listen('bagisto.admin.layout.body.after', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('currencies::admin.layouts.scripts');
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/admin-menu.php', 'menu.admin'
        );
    }
}