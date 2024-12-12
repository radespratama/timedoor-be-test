<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::factory()->count(1000)->make();

        $authors->chunk(100)->each(function ($chunk) {
            Author::insert($chunk->toArray());
        });
    }
}
