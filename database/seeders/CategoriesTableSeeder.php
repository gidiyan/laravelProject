<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['Cats', 1, 'Cats Description', now(), now()],
            ['Dogs', 1, 'Dogs Description', now(), now()],
            ['Rats', 0, 'Rats Description', now(), now()],
        ];
        foreach ($categories as $category) {
            \DB::insert("INSERT INTO categories (name,status,description,created_at,updated_at) VALUES (?,?,?,?,?)", $category);
        }
    }
}
