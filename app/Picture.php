<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
