<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public $table = 'coupons';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'game_date',
        'drag_type_id',
        'receipt_id',
        'drag_number',
        'price',
        'vat',
        'quantity',
        'total_amount',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function dragType()
    {
        return $this->belongsTo(DragType::class,'drag_type_id');
    }

    public function receipt()
    {
        return $this->belongsTo(Receipt::class,'receipt_id');
    }
}
