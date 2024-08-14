<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderStatus;

class Order extends Model
{

    use HasFactory;

    protected $primaryKey = 'order_id';
    protected $fillable = [
        'note',
        'comment',
        'rate',
        'client_id',
        'plate_id',
        'distributer_id',
        'price_id',
        'status_id'
    ];
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }

    public function plate()
    {
        return $this->belongsTo(Plate::class, 'plate_id', 'plate_id');
    }

    public function distributer()
    {
        return $this->belongsTo(Distributer::class, 'distributer_id', 'distributer_id');
    }

    public function peices()
    {
        return $this->belongsTo(Prices::class, 'price_id', 'price_id');
    }

    public function orderstatus()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id', 'status_id');
    }

    public function deleteIngredients()
    {
        return $this->belongsTo(DeletedIngredients::class, 'order_id', 'order_id');
    }
}
