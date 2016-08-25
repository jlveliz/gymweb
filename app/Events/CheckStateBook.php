<?php

namespace GymWeb\Events;

use GymWeb\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CheckStateBook extends Event
{
    use SerializesModels;

    public $bookId;
    public $secuenceDayBookDetail;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($secuence)
    {
        // $this->bookId = $bookId;
        $this->secuenceDayBookDetail = $secuence;
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
