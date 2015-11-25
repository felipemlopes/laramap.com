<?php
namespace App\Mailer;

use App\User;

/**
 * Class ListenerMailer
 * @package App\Mailer
 */
class ListenerMailer extends Mailer {

    /**
     * @param User $user
     * @param array $data
     */
    public function sendBandedEmail(User $user, $data = [])
    {
        $view = 'emails.banned';
        $subject = 'You got banned on Laramap';
        $this->sendTo($user, $subject, $view, $data);
    }

    /**
     * @param User $user
     * @param array $data
     */
    public function sendSponsorEmail(User $user, $data = [])
    {
        $view = 'emails.sponsor';
        $subject = 'Thank you for sponsoring, ' . $user->name;
        $this->sendTo($user, $subject, $view, $data);
    }

    /**
     * @param User $user
     * @param array $data
     */
    public function sendWelcomeEmail(User $user, $data = [])
    {
        $view = 'emails.welcome';
        $subject = 'Welcome to Laramap, ' . $user->name;
        $this->sendTo($user, $subject, $view, $data);
    }

    /**
     * @param User $user
     * @param array $data
     */
    public function sendSuspendedEmail(User $user, $data = [])
    {
        $view = 'emails.suspended';
        $subject = 'Your account has been suspended';
        $this->sendTo($user, $subject, $view, $data);
    }
}