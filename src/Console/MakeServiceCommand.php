<?php

namespace Yuricronos\LaravelService\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");

        if (File::exists($path)) {
            $this->error("Service {$name} already exists!");
            return;
        }

        File::ensureDirectoryExists(app_path('Services'));

        $stub = <<<EOT
        <?php

        namespace App\Services;

        class {$name}
        {
            public function __construct()
            {
                // constructor here
            }
        }
        EOT;

        File::put($path, $stub);

        $this->info("Service {$name} created successfully.");
    }
}
