<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinnerInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_id',
        'winner_name',
        'winner_photo',
    ];
}
