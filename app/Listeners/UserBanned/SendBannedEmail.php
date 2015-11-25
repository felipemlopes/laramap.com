<?php

namespace App\Listeners\UserBanned;

use App\Events\UserBanned;
use App\Mailer\ListenerMailer;
use App\Mailer\Mailer;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendBannedEmail implements ShouldQueue {

    use InteractsWithQueue;

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
     * @param  UserBanned $event
     * @return void
     */
    public function handle(UserBanned $event)
    {
        $user = User::where('id', $event->user->id)->first();//can I just rm this line and use $event->user instead
        $data = ['username' => $user->name];
        $this->mailer->sendBandedEmail($user, $data);
    }
}
