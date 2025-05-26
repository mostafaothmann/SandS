<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributer extends Model
{
    use HasFactory;

    protected $primaryKey = 'distributer_id';
    protected $fillable = [
        'user_name',
        'first_name',
        'second_name',
        'three_name',
        'birth_date',
        'phone_number',
        'email',
        'password',
        'chef_id',
        'vehicle_id',
    ];
  
    public function chef()
    {
        return $this->belongsTo(Chef::class, 'chef_id', 'chef_id');
    }

    
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'vehicle_id');
    }


    public function order(){
        return $this->hasMany(Order::class,'distributer_id','distributer_id');
    }
}
