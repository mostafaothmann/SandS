<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle']; 
    protected $primaryKey = 'vehicle_id';

    // العلاقة بين Vehicle و Distributer
    public function distributers()
    {
        return $this->hasMany(Distributer::class, 'vehicle_id', 'vehicle_id');
    }
}

