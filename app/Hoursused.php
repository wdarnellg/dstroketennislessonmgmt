<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Hoursused extends Model
{
    public $table = "hoursused";
    
    protected $fillable = array('date_time', 'lessonHours_id', 'numberofhours', 'comments');
    
    public function lessonhours()
    {
        return $this->belongsTo('App\Lessonhours', 'lessonhours_id');  
    }
    
    protected $dates = ['date_time'];
    
    public function setDateTimeAttribute($value)
    {
        $this->attributes['date_time'] = Carbon::createFromFormat('m/d/Y', $value);
    }
}
