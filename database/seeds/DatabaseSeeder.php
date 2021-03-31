<?php

use App\Picture;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call([UserSeeder::class, PlaceSeeder::class, PictureSeeder::class]);
    }
}
