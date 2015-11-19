<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserRegistered' => [
            'App\Listeners\UserRegistered\UserPush',
            'App\Listeners\UserRegistered\SendWelcomeEmail',
            'App\Listeners\UserRegistered\TweetUser',
        ],

        'App\Events\UserBanned' => [
            'App\Listeners\UserBanned\UserUnpush',
            'App\Listeners\UserBanned\SendBannedEmail',
        ],

        'App\Events\UserSuspended' => [
            'App\Listeners\UserSuspended\SendSuspendedEmail',
        ],

        'App\Events\UserBecomeSponsor' => [
            'App\Listeners\UserBecomeSponsor\SendSponsorMail',
            'App\Listeners\UserBecomeSponsor\TweetSponsor',
        ],

        'App\Events\BugSolved' => [
            'App\Listeners\Bugreports\SendSolvedMail',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
