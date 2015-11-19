<?php

namespace App\Listeners\UserRegistered;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Thujohn\Twitter\Facades\Twitter;

class TweetUser implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        Twitter::postTweet([
            'status' =>  'Welcome, "'.$event->user->username.'"" on Laramap! - https://laramap.com/@'.$event->user->username  .' #laramap #artisan',
            'format' => 'json'
        ]);
    }
}
