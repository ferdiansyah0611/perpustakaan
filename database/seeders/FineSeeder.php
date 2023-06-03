<?php

namespace Database\Seeders;

use App\Models\Fine;
use Illuminate\Database\Seeder;

class FineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fine::query()->delete();
        Fine::insert([
            [
                'borrowing_id' => 1,
                'amount' => 5000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'borrowing_id' => 2,
                'amount' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}