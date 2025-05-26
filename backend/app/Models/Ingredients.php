<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;

    protected $fillable = ['ingredients'];
    protected $primaryKey = 'ingredients_id';
    public function plate_ingredients(){
        return $this->hasMany(PlateIngredients::class,'ingredients_id','ingredients_id');
    }

    public function deleteIngredients(){
        return $this->belongsTo(DeletedIngredients::class,'ingredients_id','ingredients_id');
    }
}
