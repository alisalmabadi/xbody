<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function reserves()
    {
       return $this->belongsToMany(Day::class,'reserve_days');
    }
}
