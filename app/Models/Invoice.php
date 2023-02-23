<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $table='invoices';

    public const SETTLEMENT_STATUS = [
        0 => "Pending",
        1 => "Settled"
    ];

    protected $fillable = [
        'outlet_id',
        'start_date',
        'end_date',
        'invoice_number',
        'sell_amount',
        'vat_amount',
        'total_sell_amount',
        'total_payment',
        'outlet_commission_percent',
        'outlet_commission',
        'status',
        'payment_status',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
