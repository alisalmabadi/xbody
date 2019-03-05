<?php

namespace App\Http\Resources;

use App\Department;
use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Department as DepartmentResource;
use App\Http\Resources\DepartmentCollection;
class Company extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'departments'=>new DepartmentCollection($this->departments)
        ];
    }
}
