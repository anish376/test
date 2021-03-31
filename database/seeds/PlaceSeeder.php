<?php

use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
   
    public function run()
    {
        $data = [
                    [
                        'name' => 'Nepal',
                        'parent_id' => 0,
                    ],
                    [
                        'name' => 'Jhapa',
                        'parent_id' => 1,
                    ],
                    [
                        'name' => 'Kathmandu',
                        'parent_id' => 1,
                    ],
                    [
                        'name' => 'Basundhara',
                        'parent_id' => 3,
                    ],
                    [
                        'name' => 'New Road',
                        'parent_id' => 3,
                    ],
                    [
                        'name' => 'kakarbhitta',
                        'parent_id' => 2,
                    ],
                    [
                        'name' => 'Damak',
                        'parent_id' => 2,
                    ]
             ];

                 foreach($data as $row){
                    DB::table('places')->insert($row);
                 }
       
    }
}
