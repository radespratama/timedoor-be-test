<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunk = 5000;
        $limit = 100000;

        for ($i = 0; $i < ceil($limit / $chunk); $i++) {
            $books = Book::factory($chunk)->make();

            DB::table('books')->insert($books->toArray());
        }
    }
}
