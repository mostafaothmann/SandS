<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Provider;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey='client_id';

    protected $fillable = [
        'name' ,
        'phone_number',
        'location',
        'email' ,
        'password' ,
        'state_id',
    ];


    public function state(){
        return $this->belongsTo(State::class,'state_id','state_id');
    }

    public function order(){
        return $this->hasMany(Order::class,'client_id','client_id');
    }
}
