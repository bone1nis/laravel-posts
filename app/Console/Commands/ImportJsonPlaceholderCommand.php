<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import json placeholder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new ImportDataClient();
        $res = $client->client->request('GET', 'posts');

        $data = json_decode($res->getBody()->getContents(), true);

        foreach($data as $item) {
            Post::firstOrCreate([
                'title' => $item["title"],
            ], [
                "title" => $item["title"],
                "content" => $item["body"],
                "category_id" => 2,
        ]);
        }
    }
}
