<?php

namespace App\Console\Commands;

use App\User;
use Elasticsearch\ClientBuilder;
use Illuminate\Console\Command;

class TestElastic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:elastic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing Elasticsearch';

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
        $client = ClientBuilder::create()->build();
        $users = User::all();

        foreach($users as $user) {
            $params = [
                'index' => 'main',
                'type' => 'user',
                'id' => $user->id,
                'body' => $user
            ];
            $response = $client->index($params);
            print_r($response);
        }
    }
}
