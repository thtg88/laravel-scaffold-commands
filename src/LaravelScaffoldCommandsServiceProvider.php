<?php

namespace Thtg88\LaravelScaffoldCommands;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use Thtg88\LaravelScaffoldCommands\Console\Commands\AllCommand;
use Thtg88\LaravelScaffoldCommands\Console\Commands\HttpBundleCommand;
use Thtg88\LaravelScaffoldCommands\Console\Commands\HttpRequestsCommand;
use Thtg88\LaravelScaffoldCommands\Console\Commands\RepositoryCommand;
use Thtg88\LaravelScaffoldCommands\Console\Commands\ResourceBundleCommand;
use Thtg88\LaravelScaffoldCommands\Console\Commands\ResourceRequestCommand;
use Thtg88\LaravelScaffoldCommands\Console\Commands\ServiceCommand;

class LaravelScaffoldCommandsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Config
        $this->publishes([
            __DIR__.'/../config/laravel-scaffold-commands.php' => Container::getInstance()
                ->configPath('laravel-scaffold-commands.php'),
        ], 'laravel-scaffold-commands-config');

        // Commands
        $this->commands([
            AllCommand::class,
            HttpBundleCommand::class,
            HttpRequestsCommand::class,
            RepositoryCommand::class,
            ResourceBundleCommand::class,
            ResourceRequestCommand::class,
            ServiceCommand::class,
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-scaffold-commands.php',
            'laravel-scaffold-commands'
        );
    }
}
