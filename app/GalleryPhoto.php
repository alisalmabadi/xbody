<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    protected $fillable = [
        'gallery_id',
        'title',
        'image_path',
        'image_type',
        'alt',
        'image_thumbnail',
        'status'
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class , 'gallery_id');
    }
}
