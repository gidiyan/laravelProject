<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ['Cats', 1, 1, 1, 1, 1, 'Cats Content', now(), now()],
            ['Dogs', 1, 2, 2, 2, 2, 'Dogs Content', now(), now()],
            ['Rats', 0, 3, 3, 3, 3, 'Rats Content', now(), now()],
        ];
        foreach ($posts as $post) {
            \DB::insert("INSERT INTO posts (name,status,votes,comments,category_id,user_id,content,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?,?)", $post);
        }
    }
}
