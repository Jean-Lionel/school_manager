<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cours(){
    	return $this->hasMany('App\Models\Cour');
    }

    public function getFullNameAttribute()
    {
    	return $this->first_name.' '.$this->last_name;
    }
}
