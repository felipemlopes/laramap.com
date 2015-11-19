<?php

namespace App\Listeners\UserBecomeSponsor;

use App\Events\UserBecomeSponsor;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendSponsorMail
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
        $user = User::where('id', $event->user->id)->first();

        Mail::send('emails.sponsor', ['user' => $user], function ($m) use ($user) {
            $m->subject('Thank you for sponsoring, '.$user->name);
            $m->from('noreply@laramap.com', 'Laramap.com');
            $m->to($user->email, $user->name);
        });
    }
}
