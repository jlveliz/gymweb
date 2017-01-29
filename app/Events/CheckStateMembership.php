<?php

namespace GymWeb\Events;

use GymWeb\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CheckStateMembership extends Event
{
    use SerializesModels;

    public $detailMembership;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($detailMembership)
    {
        $this->detailMembership = $detailMembership;
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
