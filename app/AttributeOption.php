<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeOption extends Model
{
    protected  $fillable=['title','image','attribute_id','desc','order'];

    public function attribute(  ) {

        return $this->belongsToMany('App\Attribute');

    }

    public function products()
    {
        return $this->belongsToMany('App\Products','attribute_option_product','attribute_option_id','product_id');
    }

}
