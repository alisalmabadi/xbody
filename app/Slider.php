<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slide;
class Slider extends Model
{
	protected  $fillable=['name','state'];
	public function slides() {

		return $this->hasMany(Slide::class);
    }


}
