<?php

namespace App\Console\Commands;

use App\User;
use PackageBackup\Watchable\Models\Watchlist;
use Illuminate\Console\Command;

class CreateUserWatchlists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:watchlists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates watchlists for all users';

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
        $users = User::all();
        $watchlists = Watchlist::all();

        foreach($users as $user) {
            $user->createWatchlist([
                'title' =>  $user->username.' follows',
                'description' => $user->username.'_follow',
                'type' => 'follow',
            ]);

            $watchlist = Watchlist::where('author_id', $user->id)->first();
            $watchlist->addItem(User::find(1));

            $user->createWatchlist([
                'title' => $user->username.'´s Bookmarks',
                'description' => $user->username.'_bookmarks',
                'type' => 'bookmarks',
            ]);
        }
    }
}
