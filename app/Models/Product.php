<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table='products';

    protected $fillable=[
        'name',
        'price',
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function images(){
        return $this->hasMany(Image::class);

    }
}
