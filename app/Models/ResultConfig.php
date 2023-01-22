<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultConfig extends Model
{
    use HasFactory;

    public const STATUS_RADIO = [
        '1' => 'Active',
        '0' => 'Draft',
    ];

    public const RIGHT_TO_LEFT = [
        '1' => 'Left to Right',
        '0' => 'Right to Left',
    ];

    public const DIVIDE_PRIZE = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public $table = 'result_configs';

    protected $fillable = [
        'scheme_id',
        'drag_type_id',
        'result_code',
        'prize',
        'is_left_to_right',
        'max_prize',
        'divide_prize',
        'result_type',
        'lucky_match',
        'status',
    ];

    public function scheme()
    {
        return $this->belongsTo(Scheme::class);
    }

    public function dragType()
    {
        return $this->belongsTo(DragType::class);
    }
}
