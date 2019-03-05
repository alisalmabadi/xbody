<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected  $fillable=['name','slug','seo_desc','title','text'];




    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function keywords()
    {

        return $this->belongsToMany('App\Keyword');
    }

}
