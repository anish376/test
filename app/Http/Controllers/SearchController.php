<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Resources\PlaceResource;

class SearchController extends Controller
{
    public function search($name)
    {
        $result = Place::where('name', $name)->get();
        if($result->isNotEmpty()){

            $data = $this->getAllChild($result);
            return response()->json(['msg'=>'search found !','status' => 200,'data' => $data ]);
        }
        else{
            return response()->json(['msg'=>'search not found !','status' => 200 ,'data' => null]);
        }
       
        
    }

    public function getAllChild($request)
    {   
        $branch = array();
        
        foreach($request as $row){
            
            $branch[$row->name] = [
                                     'pictures' => $row->pictures->pluck('image'),
                                     'sub-places' => $row->child ? $this->getAllChild($row->child):null
                                  ];
        }
        return $branch;
        
    }

}

