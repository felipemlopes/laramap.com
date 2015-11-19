<?php

namespace App\Listeners\UserRegistered;

use App\Events\UserRegistered;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
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
        $user = User::where('id', $event->user->id)->first();

        Mail::send('emails.welcome', ['user' => $user], function ($m) use ($user) {
            $m->subject('Welcome to Laramap, '.$user->name);
            $m->from('noreply@laramap.com', 'Laramap.com');
            $m->to($user->email, $user->name);
        });
    }
}
