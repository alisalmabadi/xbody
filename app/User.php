<?php

namespace App;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Branch;
class User extends Model
{
   // use Notifiable;
   // protected $table='users';
    protected $hidden=['password'];
  protected $fillable=['first_name','email','last_name','orginal_id','branch_id','username','password','gender'];
 // protected $hidden=['password'];
    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function getCDateAttribute()
    {
        $v=new Verta($this->created_at);
       return $v->format('%d %B %Y');
    }

    public function getBranchAttribute()
    {
       $branch=Branch::where('orginal_id',$this->branch_id)->first();
       return $branch->name;
    }
}
