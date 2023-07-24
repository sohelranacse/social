<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public function getUserData(){
        return $this->belongsTo(User::class,'sender_user_id');
    }

    public function getEventData(){
        return $this->belongsTo(Event::class,'event_id');
    }

    public function getGroupData(){
        return $this->belongsTo(Group::class,'group_id');
    }
}
