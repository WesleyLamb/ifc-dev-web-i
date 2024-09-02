<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenApi\Generator;
use OpenApi\Attributes as OA;

#[OA\Info(
    title: "Posts API",
    version: "1.0.0",
    description: "A simple API to manage posts"
)]

class GenerateDocsApi extends Command
{
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

    public function handle()
    {
        $openApi = Generator::scan([__DIR__ . '/../../']); // Scan the app folder

        $openApi->saveAs(__DIR__ . '/../../../public/openapi.json');

        return 0;
    }
}
