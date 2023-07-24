<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function getUser(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function inviteEvent(){
        return $this->hasMany(Invite::class,'event_id');
    }

    

   
}
