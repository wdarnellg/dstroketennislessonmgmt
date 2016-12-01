<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Hoursused;

class DStrokeMail extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Hoursused $hoursused)
    {
        $this->hoursused = $hoursused;
        $this->lessonhours_id = $hoursused->lessonhours_id;
        $this->date_time = $hoursused->date_time;
        $this->usednumberofhours = $hoursused->numberofhours;
        $this->packnumberofhours = $hoursused->lessonhours->packages->numberofhours;
        $this->comments = $hoursused->comments;
        $this->player = $hoursused->lessonhours->players->getFullName($hoursused->lessonhours->players_id);
        $this->email = $hoursused->lessonhours->players->users->email;
        
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

