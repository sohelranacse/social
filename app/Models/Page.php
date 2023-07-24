<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public function getCategory(){
        return $this->belongsTo(Pagecategory::class,'category_id');
    }
    
    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
