<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'make',
        'model',
        'year',
        'price',
    ];


    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
