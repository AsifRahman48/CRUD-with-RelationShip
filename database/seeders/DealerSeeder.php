<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DealerSeeder extends Seeder
{
    public function run()
    {
        foreach(range(1,20) as $index)
        {
            DB::table('dealers')->insert([
                'name' => Str::random(5),
                'commission' => rand(1,10),
                'status' => rand(0,1),
            ]);
        }
    }
}
