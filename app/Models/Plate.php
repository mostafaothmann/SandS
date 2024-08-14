<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Plate extends Model
{
    use HasFactory;

    protected $primaryKey = 'plate_id';

    protected $fillable = [
        'description',
        'photo_path',
        'plate_name',
        'chef_id',
        'sub_type_id',
        'archive',
    ];

    public function chef()
    {
        return $this->belongsTo(Chef::class, 'chef_id', 'chef_id');
    }

    public function plate_ingredients()
    {
        return $this->hasMany(PlateIngredients::class, 'plate_id', 'plate_id');
    }

    public function prices()
    {
        return $this->hasMany(Prices::class, 'plate_id', 'plate_id');
    }

    public function subtype()
    {
        return $this->belongsTo(SubType::class, 'sub_type_id', 'sub_type_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'plate_id', 'plate_id');
    }
}
