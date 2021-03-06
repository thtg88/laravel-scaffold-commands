<?php

namespace Thtg88\LaravelScaffoldCommands\Console\Commands;

use Illuminate\Console\Command;

class HttpRequestsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scaffold:http-requests {model_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the HTTP Requests classes.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Get model name from arguments
        $model_name = $this->argument('model_name');

        $methods = [
            'create',
            'destroy',
            'edit',
            'index',
            'store',
            'update',
        ];

        foreach ($methods as $method) {
            $this->call('scaffold:request', [
                'name'     => $model_name,
                '--method' => $method,
            ]);
        }
    }
}
