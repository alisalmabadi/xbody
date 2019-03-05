<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable=['package_id','start_date','count_week','day_type','branch_id','user_id','status','name','last_name','phonenumber','stage'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function days()
    {
      return $this->belongsToMany(Day::class,'reserve_days');
    }

    public function ReserveDetails()
    {
        return $this->hasMany(ReserveDetail::class);
    }
}
