<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Players extends Model
{
    public $table = "players";
    
    protected $fillable = array('fname', 'lname', 'gender', 'birthdate');
    
    
    public function users()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
    
    public function lessonHours()
    {
        return $this->hasMany('App\Lessonhours', 'players_id');
    }
    
    public function getFullName($id)
    {
        return ucfirst($this->fname ) . ' ' . ucfirst($this->lname);
    }
    
    protected $dates = ['birthdate'];
    
    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = Carbon::createFromFormat('m/d/Y', $value);
    }
}
