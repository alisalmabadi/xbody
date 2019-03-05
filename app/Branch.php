<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;
    protected $fillable=['name','orginal_id','address','manager_name','phone'];

    public function users()
    {
        return $this->hasMany(Branch::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }
}
