<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedProduct extends Model
{
    use HasFactory;

    public function productData(){
        return $this->belongsTo(Marketplace::class,'product_id');
    }
}
