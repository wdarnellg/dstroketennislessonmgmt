<?php

namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Lessonhours;

class SendPackageNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $data = array(
            'lessonhours' => $event->lessonhours,
            'player' => $event->player,
            'email' => $event->email,
            'package' => $event->package
            );
        
        Mail::send('admin.email.lessonpackagenotification', $data, function($message) use ($data){
            
            $message->from('test@test.com', 'Lesson Mgmt');
            $message->to($data['email'], $data['player']);
            $message->bcc('dstroketennis@gmail.com');
            $message->subject('Tennis Lesson Package Confirmation');
            
        });
    }
}