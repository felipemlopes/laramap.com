<?php

namespace App\Events;

use App\Bugreport;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BugSolved extends Event implements ShouldBroadcast
{
    use SerializesModels;
    /**
     * @var Bugreport
     */
    public $bugreport;

    /**
     * Create a new event instance.
     *
     * @param Bugreport $bugreport
     */
    public function __construct(Bugreport $bugreport)
    {
        $this->bugreport = $bugreport;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
