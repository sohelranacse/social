<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendships extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requester', 'accepter', 'importance', 'is_accepted', 'accepted_at', 'created_at', 'updated_at'
    ];



    public function getFriend(){
        return $this->belongsTo(User::class,'requester');
    }

    public function getFriendAccepter(){
        return $this->belongsTo(User::class,'accepter');
    }

   

}
