<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable=['name','orginal_id','category_id','branch_id','package_session_count','package_price','package_offer'];
}
