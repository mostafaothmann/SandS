<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['type'];
    protected $primaryKey = 'type_id';
    public function subTypes()
    {
        return $this->hasMany(SubType::class, 'type_id', 'type_id');
    }
}
