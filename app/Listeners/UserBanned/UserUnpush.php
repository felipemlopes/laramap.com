<?php

namespace App\Listeners\UserBanned;

use App\Events\UserBanned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserUnpush implements ShouldQueue
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
     * @param  UserBanned  $event
     * @return void
     */
    public function handle(UserBanned $event)
    {
        //
    }
}
