<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrowing;

class BorrowingSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Borrowing::query()->delete();
		$data = [
			[
				'book_id' => 1,
				'user_id' => 1,
				'borrow_date' => now(),
				'return_date' => null,
				'status' => 'borrowed',
				'created_at' => now(),
        'updated_at' => now(),
			],
			[
				'book_id' => 2,
				'user_id' => 2,
				'borrow_date' => now(),
				'return_date' => null,
				'status' => 'borrowed',
				'created_at' => now(),
        'updated_at' => now(),
			],
			[
				'book_id' => 3,
				'user_id' => 3,
				'borrow_date' => now(),
				'return_date' => null,
				'status' => 'borrowed',
				'created_at' => now(),
        'updated_at' => now(),
			]
		];
		for ($i=0; $i < 10; $i++) { 
			Borrowing::insert($data);
		}
	}
}