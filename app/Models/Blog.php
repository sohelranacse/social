<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function getUser(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function cagtegory(){
        return $this->belongsTo(Blogcategory::class,'category_id');
    }
}
