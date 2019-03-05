<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReserveDetail extends Model
{
/*    protected $table="reserve_details";*/
    protected $fillable =['reserve_id','hour','date'];
    public $timestamps=false;
    public function Reserve()
    {
        return $this->belongsTo(Reserve::class);
    }
}
