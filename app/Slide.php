<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slider;
class Slide extends Model
{
	protected $fillable=['title','slider_id','link','image','order'];
	public function slider() {

		return $this->belongsTo(Slider::class);
    }
}
