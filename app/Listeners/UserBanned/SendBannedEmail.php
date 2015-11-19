<?php

namespace App\Listeners\UserBanned;

use App\Events\UserBanned;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendBannedEmail implements ShouldQueue
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
        $user = User::where('id', $event->user->id)->first();

        Mail::send('emails.banned', ['user' => $user], function ($m) use ($user) {
            $m->subject('You got banned on Laramap');
            $m->from('noreply@laramap.com', 'Laramap.com');
            $m->to($user->email, $user->name);
        });
    }
}
