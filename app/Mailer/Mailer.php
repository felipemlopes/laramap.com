<?php
namespace App\Mailer;

use Mail;

/**
 * Class Mailer
 * @package App\Mailer
 */
class Mailer {

    /**
     * @param $user
     * @param $subject
     * @param $view
     * @param array $data
     */
    public function sendTo($user, $subject, $view, $data = [])
    {
        Mail::send($view, $data, function ($message) use ($user, $subject) {
            $message->to($user->email,$user->name)
                    ->from('noreply@laramap.com', 'Laramap.com')
                    ->subject($subject);
        });
    }

}