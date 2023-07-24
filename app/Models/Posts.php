<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'user_id', 'publisher', 'publisher_id', 'post_type', 'privacy', 'tagged_user_ids', 'feel_and_activity', 'location', 'description', 'user_reacts', 'status', 'created_at', 'updated_at'
    ];

    public function getUser(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function media_files(){
        return $this->hasMany(Media_files::class, 'post_id', 'post_id');
    }
    
}
