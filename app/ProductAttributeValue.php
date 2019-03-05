<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected  $fillable=['attribute_id','product_id','value'];
    public $timestamps=false;
    public function product()
    {
        return $this->belongsTo('App\Product');

    }

    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }

}
