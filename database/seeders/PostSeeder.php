<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Judul Post Pertama',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'category_id' => '1'
        ]);
    
        Post::create([
            'title' => 'Judul Post Kedua',
            'body' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.',
            'category_id' => '1'
        ]);
    }
}
