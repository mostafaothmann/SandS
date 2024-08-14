<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $primaryKey = 'state_id';
    public function chef(){
        return $this->hasMany(Chef::class,'state_id','state_id');
    }
    public function client(){
        return $this->hasMany(Client::class,'state_id','state_id');
    }

   

    

}
