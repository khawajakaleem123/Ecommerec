<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function scopePriceSearch($q, $min, $max)
    {
        return $q->where(function ($q) use ($min, $max) {
            $q->whereBetween('price', [$min, $max]);
        });
    }

    
}
