<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
/*use Hekmatinasser\Verta\Facades\Verta;*/
use Hekmatinasser\Verta\Verta;
class ProductReserve extends Model
{
  protected $fillable=['name','lastname','phonenumber','product_id','user_id','status','type','count'];

    public function product()
    {
        return $this->belongsTo(Product::class);
  }

    public function getDateAttribute()
    {
        $verta=new \Verta($this->created_at);
        return $verta->format('%d %B, %Y');
     }

    public function getuDateAttribute()
    {
        $v=new \Verta($this->updated_at);
        return $v->format('%d %B, %Y');
     }
}
