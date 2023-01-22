<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;

    /*public $table = 'payment_logs';*/

    protected $fillable = [
        'total_divide_prize',
        'user_id',
        'payment_date',
    ];

    public function paymentBy()
    {
        return $this->belongsTo(User::class);
    }

    public function couponResults(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CouponResult::class);
    }
}
