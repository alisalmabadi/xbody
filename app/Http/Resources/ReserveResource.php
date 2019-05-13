<?php

namespace App\Http\Resources;

use App\Package;
use App\User;
use Illuminate\Http\Resources\Json\Resource;

class ReserveResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $package=[];
        $package=Package::where([['orginal_id',$this->package_id],['branch_id',$this->branch_id]])->first();
        if(empty($package)){
            $package['name']=null;
        }
        return [
            'id'=>$this->id,
            'package_name'=>$package['name'],
            'package_id'=>$this->package_id,
            'branch_id'=>$this->branch_id,
            'created_at'=>$this->created_at,
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'phonenumber'=>$this->phonenumber,
            'seen'=>$this->seen,
            /*  'user_info'=>new UserResource(User::find($this->user_id))*/
        ];
    }
}
