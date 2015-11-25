<?php

namespace App\Listeners\UserRegistered;

use App\Events\UserRegistered;
use App\Mailer\ListenerMailer;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue {

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
     * @param  UserRegistered $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = User::where('id', $event->user->id)->first();
        $data = ['username' => $user->name];
        $this->mailer->sendWelcomeEmail($user, $data);
    }
}
