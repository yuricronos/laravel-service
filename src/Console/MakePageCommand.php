<?php

namespace Yuricronos\LaravelService\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakePageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:page {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new page views';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = resource_path("views/pages/{$name}.blade.php");

        if (File::exists($path)) {
            $this->error("Page {$name} already exists!");
            return;
        }

        File::ensureDirectoryExists(resource_path('views/pages'));

        $template = config('lrvlsrvce.page_template');
        // File::put($path, $template);

        $stub = <<<EOT
        $template 
        EOT;
        File::put($path, $stub);

        $this->info("Service {$name} created successfully.");
    }
}
