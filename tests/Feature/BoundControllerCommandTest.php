<?php

namespace Thtg88\LaravelScaffoldCommands\Tests\Feature;

use Symfony\Component\Console\Exception\RuntimeException;
use Thtg88\LaravelScaffoldCommands\Tests\Concerns\ExistingFilesAssertion;
use Thtg88\LaravelScaffoldCommands\Tests\Feature\TestCase;

class BoundControllerCommandTest extends TestCase
{
    use ExistingFilesAssertion;

    /** @var string */
    protected $command_signature = 'scaffold:bound-controller';

    /** @test */
    public function not_enough_arguments_missing_name_error(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Not enough arguments (missing: "name")');

        $this->artisan($this->command_signature)
            ->assertExitCode(1);
    }

    /** @test */
    public function successful_command(): void
    {
        $name = 'CarController';
        $files = [app_path('Http/Controllers'.DIRECTORY_SEPARATOR.$name.'.php')];

        $this->artisan($this->command_signature, ['name' => $name])
            // ->expectsOutput('Controller created successfully.')
            ->assertExitCode(0);

        $this->assertFilesExist($files);

        $this->clearUpFiles($files);
    }
}
