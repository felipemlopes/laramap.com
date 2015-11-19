<?php

namespace App\Listeners\UserSuspended;

use App\Events\UserSuspended;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendSuspendedEmail
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
     * @param  UserSuspended  $event
     * @return void
     */
    public function handle(UserSuspended $event)
    {
        $user = User::where('id', $event->user->id)->first();

        Mail::send('emails.suspended', ['user' => $user], function ($m) use ($user) {
            $m->subject('Your account has been suspended');
            $m->from('noreply@laramap.com', 'Laramap.com');
            $m->to($user->email, $user->name);
        });
    }
}
