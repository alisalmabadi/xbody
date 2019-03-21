<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryVideos extends Model
{
    protected $fillable = [
        'gallery_id',
        'title',
        'video_path',
        'video_type',
        'video_thumbnail',
        'status'
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class , 'gallery_id');
    }
}
