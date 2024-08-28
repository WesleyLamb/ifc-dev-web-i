<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenApi\Generator;
use OpenApi\Attributes as OA;

class GenerateDocsApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:docs:api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate OpenAPI documentation for the API using Zircote/Swagger-PHP';

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
     * @return int
     */

    public function handle()
    {
        $openApi = Generator::scan([__DIR__ . '/../../']); // Scan the app folder
        $openApi->info->title = env('APP_NAME');
        $openApi->info->version = env('APP_VERSION');

        $openApi->saveAs(__DIR__ . '/../../../public/openapi.json');

        return 0;
    }
}
