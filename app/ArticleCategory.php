<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected  $fillable=['name','slug','img'];
    protected $table='article_categories';
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
