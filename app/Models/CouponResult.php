<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponResult extends Model
{
    use HasFactory;

    public const PAYMENT_STATUS = [
        '1' => 'Paid',
        '0' => 'Unpaid',
    ];

    public $table = 'coupon_results';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'payment_by',
        'scheme_id',
        'receipt_id',
        'coupon_id',
        'result_config_id',
        'payment_log_id',
        'prize',
        'game_day',
        'status',
        'payment_status',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function resultConfig()
    {
        return $this->belongsTo(ResultConfig::class);
    }

    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function payerInfo()
    {
        return $this->belongsTo(User::class,'payment_by');
    }

    public function scheme()
    {
        return $this->belongsTo(Scheme::class);
    }

    public function paymentLog()
    {
        return $this->belongsTo(PaymentLog::class);
    }

    public function winnerInfo()
    {
        return $this->belongsTo(WinnerInformation::class,'receipt_id','receipt_id');
    }
}
