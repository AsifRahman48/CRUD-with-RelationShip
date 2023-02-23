<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('user_id')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('price')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
};
