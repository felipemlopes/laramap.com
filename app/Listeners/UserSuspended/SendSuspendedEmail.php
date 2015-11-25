<?php

namespace App\Listeners\UserSuspended;

use App\Events\UserSuspended;
use App\Mailer\ListenerMailer;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendSuspendedEmail {

    protected $mailer;

    /**
     * Create the event listener.
     * @return void
     */
    public function __construct(ListenerMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     * @param  UserSuspended $event
     * @return void
     */
    public function handle(UserSuspended $event)
    {
        $user = User::where('id', $event->user->id)->first();
        $data = ['username' => $user->name];
        $this->mailer->sendSuspendedEmail($user, $data);
    }
}
