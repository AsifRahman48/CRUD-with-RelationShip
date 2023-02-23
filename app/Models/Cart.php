<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $table='carts';

    public $fillable=[
        'name',
        'product_name',
        'qty',
        'user_id',
        'price'
    ];
}
