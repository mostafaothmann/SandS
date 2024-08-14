<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlateIngredients extends Model
{
    use HasFactory;
    protected $primaryKey  = "plate_ingredients_id";
    protected $fillable = [
        'ingredients_id',
        'plate_id'
    ];
    public function plate(){
        return $this->belongsTo(Plate::class,'plate_id','plate_id');
    }
    public function ingredients(){
        return $this->belongsTo(Ingredients::class,'ingredients_id','ingredients_id');
    }
}
