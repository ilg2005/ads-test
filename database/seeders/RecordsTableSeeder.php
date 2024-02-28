<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $access = $i % 2;
            $data = [];

            for ($j = 0; $j < random_int(1, 10); $j++) {
                $data[$faker->word] = $faker->sentence;
            }

            DB::table('records')->insert([
                'access' => $access,
                'data' => json_encode($data),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
