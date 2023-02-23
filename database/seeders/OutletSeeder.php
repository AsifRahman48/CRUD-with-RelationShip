<?php

namespace Database\Seeders;

use App\Models\Dealer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OutletSeeder extends Seeder
{
    public function run()
    {
        foreach(range(1,20) as $index)
        {
            DB::table('outlets')->insert([
                'outlet_name' => Str::random(5),
                'outlet_code'=> rand(1111,9999),
                'address'=>Str::random('8'),
                'commission_rate' => rand(1,10),
                'dealer_id' =>Dealer::where('status',1)->get()->random()->id,
            ]);
        }
    }
}
