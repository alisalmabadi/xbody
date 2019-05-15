<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
	public function __construct() {
		$this->middleware('admin');
	}


	public function index(){
	    $menu_names=[['name'=>'هدر','id'=>1],['name'=>'فوتر','id'=>2]];
/*dd($menu_names);*/
		$menus=Menu::all();

	return view('admin.menu.menu_show',compact('menus','menu_names'));


	}

	public function addshowfrom()
	{
		$menus=Menu::all();
		return view('admin.menu.menu_add',compact('menus'));


	}

	public function editshowfrom(Menu $menu){

		$menus=Menu::all();
		return view('admin.menu.menu_edit',compact('menu','menus'));


	}
	public function edit(Menu $menu,Request $request){
		$messages=array('name.required' => 'نام منو الزامی است','link.url' => 'ادرس پیوند را درست وارد کنید مانند http://google.com','link.required' => 'وارد کردن آدرس پیوند الزامی است','parent_id.required' => 'والد درست انتخاب ندشه است');

		$this->validate($request,[
			'name' => 'required|string|max:255',
			'link' => 'required|string',
			'parent_id' => 'required',


		],$messages);



		$menu->update(['name'=>$request->name,'parent_id'=>$request->parent_id,'link'=>$request->link,'avatar'=>$request->avatar,'type'=>$request->type]);

		flash('منو ویرایش شد','info');
		return redirect('/admin/menu');




	}

	public function add(Request $request ){
		$messages=array('name.required' => 'نام منو الزامی است','link.url' => 'ادرس پیوند را درست وارد کنید مانند http://google.com','link.required' => 'وارد کردن آدرس پیوند الزامی است','parent_id.required' => 'والد درست انتخاب ندشه است');
		$this->validate($request,[
			'name' => 'required|string|max:255',
			'link' => 'required|string',
			'parent_id' => 'required',


		],$messages);
		$menu=new Menu();

		$menu->create(
		['name'=>$request->name,'parent_id'=>$request->parent_id,'link'=>$request->link,'avatar'=>$request->avatar,'type'=>$request->type]);
		flashs('منو افزوده شد','success');
		return back();


	}

	public function delete(Request $request ){

		$menu=new Menu();

		foreach ($request->input('selected' )as $id)
		{
			$deletedRows = Menu::where('parent_id', $id)->delete();
		}
		$menu->destroy($request->input('selected' ));
		flashs('منو حذف شد','danger');
		return back();


	}

	public function render(  ) {



	}


}
