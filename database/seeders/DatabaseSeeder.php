<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();
        /*$this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            //GenreSeeder::class,
            //MovieSeeder::class,
        ]);*/


        User::factory()->create([
            'name' => 'Rodrigo Medrano',
            'email' => 'rodrigo.mespa.123@gmail.com',
        ]);
    }
}
