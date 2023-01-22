<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'receipts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'scheme_id',
        'barcode_id',
        'draw_id',
        'game_date',
        'total_amount',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scheme()
    {
        return $this->belongsTo(Scheme::class,'scheme_id');
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }
}
