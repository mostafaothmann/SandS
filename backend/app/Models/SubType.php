<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubType extends Model
{
    use HasFactory;
    protected $primaryKey = 'sub_type_id';
    protected $fillable = [
        'sub_type',
        'type_id'
    ];
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'type_id');
    }

    public function plates()
    {
        return $this->hasMany(Plate::class, 'sub_type_id', 'sub_type_id');
    }
}
