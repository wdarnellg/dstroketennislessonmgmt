<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    public $table = "packages";
    protected $fillable = ['name', 'cost', 'numberofhours', 'type'];
    
    public function lessonhours()
    {
        return $this->hasMany('App\Lessonhours', 'packages_id');
    }
}
