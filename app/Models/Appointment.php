<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Time;

class Appointment extends Model
{
    use HasFactory;
    
	protected $guarded = [];

	public function coach(){
		return $this->belongsTo(User::class,'user_id','id');
	}
	public function times(){
    	return $this->hasMany(Time::class);
    }
}
