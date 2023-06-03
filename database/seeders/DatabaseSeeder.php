<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(BorrowingSeeder::class);
        $this->call(FineSeeder::class);
    }
}
