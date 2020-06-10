<?php

namespace Thtg88\LaravelScaffoldCommands;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use Thtg88\LaravelScaffoldCommands\Console\Commands\RepositoryMakeCommand;
use Thtg88\LaravelScaffoldCommands\Console\Commands\ResourceRequestMakeCommand;

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
            RepositoryMakeCommand::class,
            ResourceRequestMakeCommand::class,
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
