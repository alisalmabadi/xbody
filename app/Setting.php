<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=['logo','facebook','instagram','telegram','product_header','product_des','mainpage_header','mainpage_desc','galleryvideo_header','galleryvideo_des','galleryphoto_header','galleryphoto_des','gallerycustomer_header','gallerycustomer_des'];
}
