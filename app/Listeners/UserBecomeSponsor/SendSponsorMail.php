<?php

namespace App\Listeners\UserBecomeSponsor;

use App\Events\UserBecomeSponsor;
use App\Mailer\ListenerMailer;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendSponsorMail {

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
     * @param  UserBecomeSponsor $event
     * @return void
     */
    public function handle(UserBecomeSponsor $event)
    {
        $user = User::where('id', $event->user->id)->first();
        $data = ['username' => $user->name];
        $this->mailer->sendSponsorEmail($user, $data);
    }
}
