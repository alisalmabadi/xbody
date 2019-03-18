<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'title','video','desc','status','interview_category_id'
    ];

    public function category(){
        return $this->belongsTo(InterviewCategory::class , 'interview_category_id');
    }
}
