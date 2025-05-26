<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    protected $primaryKey = 'status_id';
    protected $fillable = ['status'];

    public function order()
    {
        return $this->hasMany(Order::class, 'status_id', 'status_id');
    }
}
