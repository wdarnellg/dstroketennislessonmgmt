<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lessonhours extends Model
{
    protected $fillable = array('signup_date', 'players_id', 'packages_id');
    
    public $table = "lessonhours";
    
    public function players()
    {
        return $this->belongsTo('App\Players', 'players_id');
    }
    
    public function packages()
    {
        return $this->belongsTo('App\Packages', 'packages_id');
    }
    
    public function hoursused()
    {
       return $this->hasMany('App\Hoursused', 'lessonhours_id');
    }
    
    protected $dates = ['signup_date'];
    
    public function setSignUpDateAttribute($value)
    {
        $this->attributes['signup_date'] = Carbon::createFromFormat('m/d/Y', $value);
    }
}
