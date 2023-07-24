<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media_files extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'post_id', 'story_id', 'album_id', 'file_name','product_id','page_id','group_id','chat_id', 'file_type', 'privacy', 'created_at', 'updated_at'
    ];

    public function post(){
        return $this->belongsTo(Posts::class,'post_id', 'post_id');
    }
    
}
