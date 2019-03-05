<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public  $created_atp;
    protected $orderBy = 'created_at';
    protected $orderDirection = 'ASC';
    protected  $fillable=['article_category_id',
        'title',
        'body',
        'seo_title',
        'img',
        'slug',
        'seo_desc',
        'img_thumbnail',
        'short'
    ];
    public function article_category()
    {
        return $this->belongsTo('App\ArticleCategory');
    }

    public function keywords()
    {
        return $this->belongsToMany('App\Keyword','article_keywords');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function test()
    {

        if($this->exists()){
            $this->update(['title','salam']);
            return true;
        }

    }
}
