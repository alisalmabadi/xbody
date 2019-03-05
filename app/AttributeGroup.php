<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    protected  $fillable=['name','desc'];

    public function attributes() {

        return $this->belongsToMany('App\Attribute','attribute_attribute_groups','attribute_group_id','attribute_id');

    }

    public function categories()
    {
        return $this->belongsToMany('App\Category','attribute_group_category','attribute_group_id','category_id');
    }

}