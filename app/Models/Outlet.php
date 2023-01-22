<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outlet extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'outlets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'outlet_name',
        'outlet_code',
        'cr_no',
        'building_no',
        'road',
        'block',
        'outlet_area',
        'cpr',
        'contact_name',
        'imei',
        'latitude',
        'longitude',
        'comission_rate',
        'dealer_id',
      /*  'executive_id',*/
        'area_id',
        'dealer_mobile',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function dealer()
    {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }

    public function executive()
    {
        return $this->belongsTo(Executive::class, 'executive_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function sellReports()
    {
        return $this->hasMany(SellsReport::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
