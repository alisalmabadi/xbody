<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewCategory extends Model
{
    protected $fillable = ['name' , 'slug'];

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
}
