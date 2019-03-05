<?php

namespace App\Http\Controllers;
use App\Day;
use App\Menu;
use Illuminate\Http\Request;
use App\Branch;
use Illuminate\Support\Facades\Response;
class RequestController extends Controller
{

    public function index()
    {
        $menus=Menu::all();
/*        $captcha=captcha_img('flat');*/

        return view('request.index',compact('menus'));
    }



    public function show()
    {
        if(session()->get('user')==null) {
            $branches = Branch::all();
            $menus = Menu::all();
            $days = Day::all();
            $captcha = captcha_img('flat');
            return view('request.request_add', compact('days', 'menus', 'branches', 'captcha'));
        }else{
            return redirect(route('user.reserve'));
        }
    }

    public function branch(Request $request)
    {
        $branches=getpackages($request->id);
        $branches=json_decode($branches);
        $branches=json_decode($branches);
        foreach ($branches as $branch){
            $data[]="";
            $data[].="<option value='$branch->PackageID'>".$branch->PackageName."       ".$branch->PackagePrice."   تومان     ";
            $data[].="</option>";

        }
/*dd($branches);*/
        return $data;

    }
}
