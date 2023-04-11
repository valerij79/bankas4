<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create('lt_LT');

        foreach(range(1, 10) as $_) {
            $account_no = 'LT' . rand(10, 99) . ' 7300 0' . rand(100, 999) . ' ' . rand(1000, 9999) . ' ' . rand(1000, 9999);
            $personal_id = rand(10000000000, 99999999999);
            DB::table('clients')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'account_no' => $account_no,
                'personal_id' => $personal_id,
                'funds' => 0,
            ]);
        }
    }

    
}
