<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $table='orders';

    public $fillable=[
        'name',
        'email',
        'phone',
        'amount',
        'address',
        'status',
        'transaction_id',
        'currency',
        'user_id'
    ];
}
