<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,20) as $index)
        {
            DB::table('products')->insert([
                'name' => Str::random(10),
                'price' => rand(100,1000),
                'category_id' => rand(0,20),

            ]);
        }
    }
}
