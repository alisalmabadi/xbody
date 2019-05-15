<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected  $fillable=['name','title','seo_desc','slug','image','skill','state'];
    public function keywords()
    {
        return $this->belongsToMany('App\Keyword','category_keywords');
    }

    /*public function attributes()
    {

        return $this->belongsToMany('App\Attribute','attribute_category');

    }*/

    public function attribute_groups()
    {

        return $this->belongsToMany('App\AttributeGroup','attribute_group_category');

    }

    public function products()
    {
        return $this->hasMany('App\Product')->orderBy('order','ASC');

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
