<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'test title',
            'description' => 'description in test post ........',
            'post_img' => 'test.png',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Post::factory()->count(10)->create();
    }
}
