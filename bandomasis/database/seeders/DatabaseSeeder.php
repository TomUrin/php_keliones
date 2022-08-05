<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 5) as $__) {
            DB::table('countries')->insert([
                'title' => $faker->country,
                'seasonStart' => '',
                'seasonEnd' => ''
            ]);
        }

            foreach(range(1, 10) as $_) {
                DB::table('hotels')->insert([
                    'country_id' => rand(1, 5),
                    'title' => $faker->company,
                    'image_path' => '',
                    'duration' => rand(1, 14),
                    'price' => rand(200, 5000),
                ]);
            }

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1'),
            'role' => 10,
        ]);
    }
}
