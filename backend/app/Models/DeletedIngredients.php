<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedIngredients extends Model
{
    use HasFactory;

    public function order(){
        return $this->belongsTo(Order::class,'order_id','order_id');
    }

    public function Ingredients(){
        return $this->belongsTo(Order::class,'ingredients_id','ingredients_id');
    }
}
