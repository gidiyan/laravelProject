<?php

namespace Database\Seeders;

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
        \DB::statement("TRUNCATE TABLE categories");
        \DB::statement("TRUNCATE TABLE posts");
        $this->call([
            CategoriesTableSeeder::class,
            PostsTableSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
