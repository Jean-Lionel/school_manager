<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = ['level_id','name'];

    public function students(){
    	return $this->hasMany('App\Models\Student');
    }
}
