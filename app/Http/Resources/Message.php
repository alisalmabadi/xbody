<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Message extends Resource
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
            'id'=>$this->id,
            'text'=>$this->text,
            'created_at'=>$this->created_at,
        ];
       // return parent::toArray($request);
    }
}
