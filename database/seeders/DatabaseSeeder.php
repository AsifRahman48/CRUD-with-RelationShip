<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker=Faker::create();

        foreach (range(1,20) as $index)
        {
            DB::table('products')->insert([
                'name'=>$faker->name,
                'price' =>Str::random(3),
                'category_id' =>Str::random(2)
            ]);
        }
    }
}
