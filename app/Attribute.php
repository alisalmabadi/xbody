<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected  $fillable=['name','type','desc'];

    public function attribute_groups()
    {
        return $this->belongsToMany('App\AttributeGroup','attribute_attribute_groups','attribute_id','attribute_group_id');

    }

    public function product_attribute_values()
    {
        return $this->hasMany('App\ProductAttributeValue');

    }


    public function attribute_options()
    {

        return $this->hasMany('App\AttributeOption');
    }


    public function products()
    {
        return $this->belongsToMany('App\Products','attribute_product','attribute_id','product_id');
    }
}
