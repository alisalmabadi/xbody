<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Article;
use App\ArticleCategory;
use App\Setting;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('admin');
	}


	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function admin_panel()
	{
		$loader=array();
		$loader['user_count']=count(User::all());
        $loader['post_count']=count(Article::all());
        $loader['category_count']=count(ArticleCategory::all());
        return view('admin.index',compact('loader'));
	}

	public function show(  ) {

	}

	public function index()
	{
		$admins=Admin::all();
		return	view('admin.admin.admin_show',compact('admins'));
	}

	public function edit(Admin $admin)
	{

			return view('admin.admin.admin_edite',compact('admin'));
	}

	public function update(Admin $admin,Request $request)
	{
		$this->validate($request,[
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
		]);

		$admin->update([ 'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
		]);
        flashs('کابر بروز رسانی شد!');
		return back();
	}

    public function setting(Request $request)
    {
        if($request->file('logo')) {
            $logo = $request->file('logo');
            $logoname = sha1($logo->getClientOriginalName());
            $extention = $logo->getClientOriginalExtension();
            $logo->move('images/setting/', $logoname . '.' . $extention);
            $setting = Setting::find(1)->update([
                'logo' => 'images/setting/' . $logoname . '.' . $extention,
            ]);
        }else{
            $setting=Setting::find(1)->update($request->except(['logo']));
        }

        flashs('تنظیمات ذخیره شد!','info');
        return back();
    }

    public function setting_index()
    {
        $setting=Setting::find(1);
        return view('admin.setting.setting_add',compact('setting'));
    }


}
