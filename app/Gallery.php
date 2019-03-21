<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['name' , 'slug' , 'desc' , 'image_original' , 'image_type' , 'image_thumbnail' , 'status' , 'type'];

    public function photos(){
        return $this->hasMany(GalleryPhoto::class);
    }

    public function videos(){
        return $this->hasMany(GalleryVideos::class);
    }
}
