<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use Illuminate\Console\Command;

class importJsonPlaceholderCommand extends Command
{
    protected $signature = 'import:jsonplaceholder';

    protected $description = 'Get data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $import = new ImportDataClient();
        $response = $import->client->request('GET', '');
        $data = json_decode($response->getBody()->getContents());

        foreach ($data as $item) {
            dd($item);
        }
    }
}
