<?php

namespace App\Listeners\Bugreports;

use App\Bugreport;
use App\Events\BugSolved;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendSolvedMail implements ShouldQueue
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
     * @param  BugSolved  $event
     * @return void
     */
    public function handle(BugSolved $event)
    {
//        return $event;
//        $email = $event->bugreport->email;
//        $bugreport = Bugreport::where('id', $event->bugreport->id)->first();


//        Mail::queueOn('default', 'emails.bug_solved', ['event' => $event], function ($m) use ($event) {
//            $m->subject('Your reported bug is solved');
//            $m->from('noreply@laramap.com', 'Laramap.com');
//            $m->to($event->bugreport->email, $event->bugreport->email);
////            $event->bugreport->delete();
//        });

    }
}
