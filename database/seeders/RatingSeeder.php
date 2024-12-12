<?php

namespace Database\Seeders;

use App\Models\Rating;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $chunk = 5000;
    $limit = 500000;

    for ($i = 0; $i < ceil($limit / $chunk); $i++) {
      $rating = Rating::factory($chunk)->make();

      DB::table('ratings')->insert($rating->toArray());
    }
  }
}
