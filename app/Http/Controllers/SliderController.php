<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Slider;
use App\Slide;

class SliderController extends Controller
{

	public function __construct() {
		$this->middleware('admin');
	}

	public function show(Slider $slider)
	{
	}

	public function index(){
		$sliders=Slider::all();
		//$sliders->load('slider.slides');

		return view('admin.slider.slider_index',compact('sliders'));
	}

	public function create()
	{
		return view('admin.slider.slider_create');


	}



	public function store(Request $request)
	{
		$messages=array('name.required'=>'وارد کردن نام اسلایدر الزامی است','slide.*.order.required' => 'ورود ترتیب الزامی است','slide.*.order.numeric' => 'ترتیب  باید عددی وارد شود','link.url' => 'ادرس پیوند را درست وارد کنید مانند http://google.com','link.required' => 'وارد کردن آدرس پیوند الزامی است');
		$this->validate($request,[
			'name' => 'required|string|max:255',
			'state'=>'required',
			'slide'=>'array',
			'slide.*.title'=>'nullable|string',
			'slide.*.link'=>'nullable|url',
			'slide.*.order'=>'numeric|required',

		],$messages);

		$slider =new Slider();
		$slider=$slider->create(['name'=>$request->name,'state'=>$request->state]);
		if($request->slide)
		{

			foreach ($request->slide as $slideitem)
			{

				$slider->slides()->create(
					['title'=>$slideitem['title'],'link'=>$slideitem['link'],'image'=>$slideitem['image'],'order'=>$slideitem['order']]);

			}
		}
		flashs('اسلایدر با موفقیت ایجاد شد');

		return redirect(route('admin.slider.index'));

	}
	public function edit(Slider $slider)
	{
		$sliders=$slider->load('slides.slider');
//		$categories=Category::all(['id','name']);
		return view('admin.slider.slider_edit',compact('sliders'));

	}


	public function update(Request $request,Slider $slider) {
		$messages=array('name.required'=>'وارد کردن نام اسلایدر الزامی است','slide.*.order.required' => 'ورود ترتیب الزامی است','slide.*.order.numeric' => 'ترتیب  باید عددی وارد شود','link.url' => 'ادرس پیوند را درست وارد کنید مانند http://google.com','link.required' => 'وارد کردن آدرس پیوند الزامی است');
		$this->validate($request,[
			'name' => 'required|string|max:255',
			'state'=>'required',
			'slide'=>'array',
			'slide.*.title'=>'nullable|string',
			'slide.*.link'=>'nullable|url',
            /*'order'=>'required'*/

		],$messages);


		$slider->update(['name'=>$request->name,'state'=>$request->state]);
		$slides=$slider->slides();

		$white_list=array();
		if($request->slide)
		{
			foreach ($request->slide as $slideitem)
			{
                $slideup=Slide::firstOrNew(['id'=>$slideitem['id']]);
					$slideup->fill(['title'=>$slideitem['title'],'slider_id'=>$slider->id, 'link'=>$slideitem['link'],'image'=>$slideitem['image'],'order'=>$slideitem['order']])->save();
					$white_list=array_add($white_list,count($white_list),$slideup->id);



			}
		}

		$black_list=$slides->whereNotIn('id', $white_list)->delete();
		flashs('اسلایدر ویرایش شد.');
		return redirect(route('admin.slider.index'));
	}

	public function destroy(Request $request ){

		$slider=new Slider();

		foreach ($request->input('selected' )as $id)
		{
			$deletedRows = Slide::where('slider_id', $id)->delete();



		}
		$slider->destroy($request->input('selected' ));
		flashs('اسلایدر حذف شد','danger');
		return back();

	}



}
