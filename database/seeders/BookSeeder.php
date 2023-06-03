<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::query()->delete();
        Book::insert([
            [
                'title' => 'Belajar Laravel 9',
                'author' => 'John Doe',
                'year_published' => '2022-01-01',
                'issuer' => 'Penerbit A',
                'page_number' => 200,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kumpulan Cerpen',
                'author' => 'Jane Doe',
                'year_published' => '2023-01-01',
                'issuer' => 'Penerbit B',
                'page_number' => 150,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Buku Sejarah',
                'author' => 'Adam Smith',
                'year_published' => '2021-01-01',
                'issuer' => 'Penerbit C',
                'page_number' => 300,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}