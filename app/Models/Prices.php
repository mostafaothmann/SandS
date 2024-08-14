<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    use HasFactory;

    protected $primaryKey='price_id';
    protected $fillable = [
        'person_number',
        'price',
        'discount',
        'plate_id',
    ];

    public function plate()
    {
        return $this->belongsTo(Plate::class, 'plate_id', 'plate_id'); // belongsTo
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'price_id', 'price_id');
    }
}
