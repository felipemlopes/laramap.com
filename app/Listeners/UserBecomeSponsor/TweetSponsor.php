<?php

namespace App\Listeners\UserBecomeSponsor;

use App\Events\UserBecomeSponsor;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Thujohn\Twitter\Facades\Twitter;

class TweetSponsor
{
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
     * @param  UserBecomeSponsor  $event
     * @return void
     */
    public function handle(UserBecomeSponsor $event)
    {
        Twitter::postTweet([
            'status' =>  'Many thanks to , "'.$event->user->username.'" for sponsoring!! - https://laramap.com/@'.$event->user->username  .' #laramap #sponsor',
            'format' => 'json'
        ]);
    }
}
