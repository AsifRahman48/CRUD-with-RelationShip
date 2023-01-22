<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scheme extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_RADIO = [
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    public $table = 'schemes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'icon',
        'code',
        'description',
        'result_note',
        'digit',
        'max_drag_number_per_coupon',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function dragTypes()
    {
        return $this->hasMany(DragType::class);
    }

    public function activeDragTypes()
    {
        return $this->dragTypes()->where('status', '=', 1);
    }
}
