<?php

namespace Thtg88\LaravelScaffoldCommands\Tests\Feature;

use Symfony\Component\Console\Exception\RuntimeException;
use Thtg88\LaravelScaffoldCommands\Tests\Concerns\ExistingFilesAssertion;

class RepositoryCommandTest extends TestCase
{
    use ExistingFilesAssertion;

    /** @var string */
    protected $command_signature = 'scaffold:repository';

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
        $name = 'CarRepository';
        $files = [app_path('Repositories'.DIRECTORY_SEPARATOR.$name.'.php')];

        $this->artisan($this->command_signature, ['name' => $name])
            // ->expectsOutput('Repository created successfully.')
            ->assertExitCode(0);

        $this->assertFilesExist($files);

        $this->clearUpFiles($files);
    }
}
