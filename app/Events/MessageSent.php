<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Lessonhours;

class MessageSent extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
     public function __construct(Lessonhours $lessonhours)
    {
        $this->lessonhours = $lessonhours; 
        $this->player = $lessonhours->players->getFullName($lessonhours->players_id);
        $this->email = $lessonhours->players->users->email;
        $this->package = $lessonhours->packages->name;
        
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
