<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name',
        'first_name',
        'second_name',
        'three_name',
        'image_path',
        'email',    
        'password',
        'birth_date',
        'mobile_number',
        'cv_path',
        'location',
        'state_id',
    ];
    protected $primaryKey = 'chef_id';
    public function state(){
        return $this->belongsTo(State::class, 'state_id', 'state_id'); 
    }

    public function distributer(){
        return $this->hasMany(Distributer::class, 'chef_id', 'chef_id');
    }
    
    public function plates(){
        return $this->hasMany(Plate::class, 'chef_id', 'chef_id'); 
    }
}

