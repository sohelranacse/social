<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cache;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_role',
        'user_name',
        'nickname',
        'username',
        'gender',
        'friends',
        'followers',
        'studied_at',
        'profession',
        'job',
        'marital_status',
        'date_of_birth',
        'photo',
        'about',
        'phone',
        'address',
        'cover_photo',
        'status',
        'timezone',
        'lastActive',
        'email_verified_at',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];



    public function isOnline(){
        return Cache::has('user-is-online-'.$this->id);
    }

    public static function get_user_image($file_name = "", $optimized = ""){
        $optimized = $optimized.'/';
        if(base_path('public/storage/userimage/'.$optimized.$file_name) && is_file('public/storage/userimage/'.$optimized.$file_name)){
            return asset('storage/userimage/'.$optimized.$file_name);
        }else{
            return asset('storage/userimage/default.png');
        }
    }
}
