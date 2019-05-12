<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Article;
use App\Branch;
use App\Http\Requests;
use App\Menu;
use App\Slider;

use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $menus=Menu::all();

        $slider=Slider::with([
            'slides' => function($q)
            {
                $q->orderBy('order', 'ASC');
            }])
            ->where('state', '=', 1)
            ->first();
/*          $categories=Category::where('state','=','1')->get();
          $posts=Post::where('post_type','1')->orderBy('order','ASC')->get();*/
            //$articles=Article::skip(0)->take(4)->get();
/*        $articles=Article::orderBy('id','desc')->limit(4)->get();*/
            $articles=Article::orderBy('id','desc')->get();

        $branches = Branch::all()->take(6);
        return view('index_page',compact('menus','slider','articles','branches'));

    }

    public function config(Request $request)
    {
        \Setting::set('site_name', $request->config_site_name);
        flashs('تنظیمات بروز رسانی شد!','success');
        return back();
    }

    public function contactus()
    {
        $branches=Branch::all();
        return view('contactus',compact('branches'));
    }
}