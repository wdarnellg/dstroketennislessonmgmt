<?php

namespace App\Listeners;

use App\Events\DStrokeMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use DB;

class SendHoursUsedNotification
{
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
     * @param  DStrokeMail  $event
     * @return void
     */
    public function handle(DStrokeMail $event)
    {
        $data = array(
            'used' => DB::table('hoursused')->where('lessonhours_id', '=', $event->lessonhours_id)->sum('numberofhours'),
            'date_time' => $event->date_time,
            'email' => $event->email,
            'usednumberofhours' => $event->usednumberofhours,
            'packnumberofhours' => $event->packnumberofhours,
            'player' => $event->player,
            'comments' => $event->comments
            );
            
             Mail::send('admin.email.hoursusednotification', $data, function($message) use ($data){
            
            $message->from('test@test.com', 'Lesson Mgmt');
            $message->to($data['email'], $data['player']);
            $message->bcc('dstroketennis@gmail.com');
            $message->subject('Lesson Package Update');
           
        });
    }
}