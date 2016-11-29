<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoursused extends Model
{
    public $table = "hoursused";
    
    protected $fillable = array('date_time', 'lessonHours_id', 'numberofhours', 'comments');
    
    public function lessonhours()
    {
        return $this->belongsTo('App\Lessonhours', 'lessonhours_id');  
    }
    
    protected $dates = ['date_time'];
}
