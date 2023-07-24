<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketplace extends Model
{
    use HasFactory;

    public function getUser(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getCategory(){
        return $this->belongsTo(Category::class,'category');
    }
    public function getBrand(){
        return $this->belongsTo(Brand::class,'brand');
    }

    public function getCurrency(){
        return $this->belongsTo(Currency::class,'currency_id');
    }



}
