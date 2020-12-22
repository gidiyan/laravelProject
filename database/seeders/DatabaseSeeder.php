<?php

namespace Database\Seeders;

use App\Models\Brand;
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
//        \DB::statement("TRUNCATE TABLE categories");
        \DB::statement("TRUNCATE TABLE posts");
        $this->call([
//            CategoriesTableSeeder::class,
            PostsTableSeeder::class
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Brand::factory(20)->create();
        \App\Models\Category::factory(20)->create();
        \App\Models\Product::factory(60)->create();
        \App\Models\Profile::factory(10)->create();

    }
}
