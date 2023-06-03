<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Category::query()->delete();
		Category::insert([
	    ["name" => 'Action and adventure', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Alternate history', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Anthology', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Art/architecture', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Autobiography', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Biography', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Business/economics', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Chick lit', "created_at" => now(), "updated_at" => now()],
	    ["name" => "Children's", "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Classic', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Comic book', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Coming-of-age', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Cookbook', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Crafts/hobbies', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Crime', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Diary', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Dictionary', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Drama', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Encyclopedia', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Fairytale', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Fantasy', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Graphic novel', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Guide', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Health/fitness', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Historical fiction', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'History', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Home and garden', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Horror', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Humor', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Journal', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Math', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Memoir', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Mystery', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Paranormal romance', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Philosophy', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Picture book', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Poetry', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Political thriller', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Prayer', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Religion, spirituality, and new age', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Review', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Romance', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Satire', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Science fiction', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Science', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Self help', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Short story', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Sports and leisure', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Suspense', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Textbook', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Thriller', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Travel', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'True crime', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Western', "created_at" => now(), "updated_at" => now()],
	    ["name" => 'Young adult', "created_at" => now(), "updated_at" => now()],
		]);
	}
}