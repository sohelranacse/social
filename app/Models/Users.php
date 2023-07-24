<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_role', 'user_name', 'email', 'password', 'name', 'nickname', 'friends', 'followers', 'gender', 'studied_at', 'address', 'profession', 'job', 'marital_status', 'phone', 'date_of_birth', 'about', 'photo', 'cover_photo', 'status'
    ];
}
