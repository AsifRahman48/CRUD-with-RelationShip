<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId("outlet_id")->constraint("outlets")->onDelete("cascade");
            $table->date('start_date');
            $table->date('end_date');
            $table->string('invoice_number');
            $table->decimal('sell_amount',10);
            $table->decimal('vat_amount',10);
            $table->decimal('total_sell_amount',10);
            $table->decimal('total_payment',10);
            $table->integer('outlet_commission_percent');
            $table->decimal('outlet_commission',10);
            $table->tinyInteger('status')->default(0)->comment('0 => draft, 1 => published');
            $table->tinyInteger('payment_status')->default(0)->comment('1 => Paid, 0 => Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
