<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         $places =  DB::table('places')->get();
         foreach($places as $place){
             $imageCount = rand(1,5);
             for($i=0; $i<$imageCount; $i++){
                DB::table('pictures')->insert([
                    'place_id' => $place->id,
                    'image' => Str::random(5).'.jpg'
                ]);
             }
           
         }
             
    }
}
