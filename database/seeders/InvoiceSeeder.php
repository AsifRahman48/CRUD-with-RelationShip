<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        foreach(range(1,20) as $index)
        {
            DB::table('invoices')->insert([
                'outlet_id' =>Outlet::get()->random()->id,
                'start_date' => Carbon::now()->addDays(-3)->format('Y-m-d'),
                'end_date' => Carbon::now()->format('Y-m-d'),
                'invoice_number'=> rand(1111,9999),
                'sell_amount'=>rand(1111,9999),
                'vat_amount' => rand(111,999),
                'total_sell_amount'=>rand(111,999),
                'total_payment'=>rand(1111,9999),
                'outlet_commission_percent'=>rand(1,9),
                'outlet_commission'=>rand(1,9),
                'status'=>rand(0,1),
                'payment_status'=>rand(0,1),
            ]);
        }
    }
}
