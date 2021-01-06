<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teacher(){
    	return $this->belongsTo('App\Models\Teacher');
    }

    public function classe(){
    	return $this->belongsTo('App\Models\Classe');
    }
}
