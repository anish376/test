<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function child()
    {
        return $this->hasMany('App\Place', 'parent_id');
    }
}
