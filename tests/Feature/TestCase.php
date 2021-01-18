<?php

namespace Thtg88\LaravelScaffoldCommands\Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Thtg88\LaravelScaffoldCommands\LaravelScaffoldCommandsServiceProvider;
use Thtg88\LaravelScaffoldCommands\Tests\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use WithFaker;

    protected function getEnvironmentSetUp($app)
    {
        //
    }

    /**
     * Load package service provider.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return \Thtg88\LaravelScaffoldCommands\LaravelScaffoldCommandsServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [LaravelScaffoldCommandsServiceProvider::class];
    }
}
