<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'brand',
        'price',
        'category',
        'weight',
        'product_description'
    ];
}
