<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
    protected $orderBy = 'id';
    public $sell_profit=0;
    public $sell_count=0;
    public $sell_price=0;
    protected  $fillable=['category_id','name','title','desc','slug','seo_desc',
        'model','price','order'
    ];
    public function product_attribute_values()
    {
        return $this->hasMany('App\ProductAttributeValue');
    }

    public function keywords()
    {
        return $this->belongsToMany('App\Keyword','product_keywords');
    }

    public function category()
    {

        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->belongsToMany('App\ImageManagerFiles','image_manager_files_product','product_id','image_manager_files_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function attributes()
    {
        return $this->belongsToMany('App\Attribute','attribute_product','product_id','attribute_id')->orderBy('attribute_id');
    }

    public function attribute_option()
    {
        return $this->belongsToMany('App\AttributeOption','attribute_option_product','product_id','attribute_option_id');
    }

    public function product_reserves()
    {
       return $this->hasMany(ProductReserve::class);
    }
}
