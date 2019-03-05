<?php

namespace App\Http\Controllers;

use App\Day;
use App\Delivery;
use App\Product;
use App\Cart;
use App\Province;
use App\Reserve;
use App\User;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use App\Operator;
use App\Menu;
use Carbon\Carbon;
use App\City;
use App\Cookie;



class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('xAuth')->except(['getreservesdays','test']);
    }

    public function index()
    {
        $loader=array();
        $user=User::where([['orginal_id',session()->get('user')['UserID']],['branch_id',session()->get('user')['BranchNo']]])->first();
        if($user->reserves()->exists()) {
            //dd($user->reserves());
            foreach ($user->reserves as $reserve) {
                $loader['all'][] = $reserve->id;
                if($reserve->status==1){
                    $loader['active'][] = $reserve->id;
                }else{
                    $loader['active']=null;
                }
                if($reserve->ReserveDetails()->exists()) {
                    $loader['date']=array();
                    foreach ($reserve->ReserveDetails as $res) {

                        $loader['date'][] = $res->date;
                    }
                   /* dd($loader['date']);*/
                }else{
                    $loader['date']=0;
                }
                if($reserve->day_type==1){
                    $loader['zoj'][]=$reserve->id;
                }else{
                    $loader['zoj']=null;
                }
            }
            $loader['all']=count($loader['all']);
            if($loader['active']!=null){
                $loader['active']=0;
            }
            $loader['active'] = count($loader['active']);

            if($loader['date']!=null){
                $loader['date']=count($loader['date']);
            }else {
                $loader['date'] =0;
            }
            if($loader['zoj']!=null) {
                $loader['zoj'] = count($loader['zoj']);
            }else{
                $loader['zoj']=0;
            }
        }else{
            $loader['all'] = 0;
            $loader['active'] = 0;
            $loader['date']=0;
            $loader['zoj']=0;
            $loader['date']=0;

        }

        return view('user.home',compact('loader'));
    }

    public function test()
    {
        users();
    }

    public function reserve()
    {
        $days=Day::where('status',1)->get();
        $packages=getpackages(session()->get('user')['BranchNo']);
        $packages=json_decode($packages);
        $packages=json_decode($packages);
        //dd($packages);
        return view('user.reserve.reserve_add',compact('packages','days'));
    }

    public function getreservedays(Request $request)
    {
        $this->validate($request,[
            'package'=>'not_in:0',
            'date'=>'required',
            'DayType'=>'not_in:0',
            'countday'=>'not_in:0',
/*            'days'=>'required',*/


        ],[
            'package.not_in'=>'لطفا پکیج مورد نظرتان را انتخاب کنید.',
            'date.required'=>'تاریخ شروع پکیج را وارد کنید.',
/*            'days.required'=>'روزهایی که مایل نیستید را انتخاب کنید.',*/
            'DayType.not_in'=>'لطفا نوع روز  مورد نظر را وارد کنید.',
            'countday.not_in'=>'لطفا تعداد روز ها را انتخاب کنید.',


        ]);
        if(is_null($request->days)){
            $dayha=[];
        }else{
            $dayha=$request->days;
        }
        if(isset($request->days)) {
            foreach ($request->days as $day) {
                $days[] = Day::where('slug', $day)->first();
            }
            $days = array_pluck($days, 'id');
        }
        $branch_id=session()->get('user')['BranchNo'];
        $user=User::where([['orginal_id',session()->get('user')['UserID']],['branch_id',$branch_id]])->first();
        //dd($user->id);
        $token='c6ef92be07fbd8091aaff53e455f6a24b1bae4d4';
        $date=$request->date;
        $date=Convertnumber($date);
        $date=explode('/',$date);
       // dd($date);
        $date= Verta::getGregorian($date[0],$date[1],$date[2]);
        $dated=$date[0].'-'.$date[1].'-'.$date[2];
        $reserve=Reserve::create([
            'package_id'=>$request->package,
            'start_date'=>$dated,
            'count_week'=>$request->countday,
            'day_type'=>(int)$request->DayType,
            'branch_id'=>$branch_id,
            'user_id'=>$user->id,
            'stage'=>null
        ]);
        if(isset($request->days)) {
            $reserve->days()->attach($days);
        }
        $json=['PackageID'=>(int)$request->package,"StartDate"=>$dated,"SessionCountInWeek"=>(int)$request->countday,"DayType"=>(int)$request->DayType,'ExceptDays'=>$dayha,'id'=>(int)$branch_id,'Token'=>$token];

        $json=json_encode($json);
        // $json="Params=".$json;
        $res=senddataresreve($json);
        $res=json_decode($res);
        $res=json_decode($res);
        // dd($res);
        $user_originalid=$user->orginal_id;
        return view('user.reserve.reserve_final',compact('res','reserve','user_originalid','days','dy'));
        /*dd($res->ReservationDetailList);*/
    }

    public function getreservesdays(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'lastname'=>'required',
            'phonenumber'=>'required|numeric',
            'branch'=>'required|not_in:0',
            'package'=>'not_in:0',
            'date'=>'required',
            'DayType'=>'not_in:0',
            'countday'=>'not_in:0',
            'captcha'=>'required|captcha'
            /*            'days'=>'required',*/


        ],[
            'name.required'=>'لطفا نام را وارد کنید.',
            'lastname.required'=>'نام خانوادگی را وارد کنید.',
            'phonenumber.required'=>'شماره همراه را وارد کنید',
            'phonenumber.numeric'=>'شماره همراه را به صورت عددی وارد کنید.',
            'branch.not_in'=>'شعبه مورد نظر معتبر نمیباشد.',
            'package.not_in'=>'لطفا پکیج مورد نظرتان را انتخاب کنید.',
            'date.required'=>'تاریخ شروع پکیج را وارد کنید.',
            /*            'days.required'=>'روزهایی که مایل نیستید را انتخاب کنید.',*/
            'DayType.not_in'=>'لطفا نوع روز  مورد نظر را وارد کنید.',
            'countday.not_in'=>'لطفا تعداد روز ها را انتخاب کنید.',
            'captcha.captcha'=>'کد امنیتی صحیح نمیباشد.',
            'captcha.required'=>'کدامنیتی را وارد کنید.'


        ]);
        //dd($request->all());
        if(is_null($request->days)){
            $dayha=[];
        }else{
            $dayha=$request->days;
        }
        if(isset($request->days)) {
            foreach ($request->days as $day) {
                $days[] = Day::where('slug', $day)->first();
            }
            $days = array_pluck($days, 'id');
        }
        $token='c6ef92be07fbd8091aaff53e455f6a24b1bae4d4';
        $date=$request->date;
        $date=Convertnumber($date);
        $date=explode('/',$date);
        // dd($date);
        $date= Verta::getGregorian($date[0],$date[1],$date[2]);
        $dated=$date[0].'-'.$date[1].'-'.$date[2];
        $reserve=Reserve::create([
            'package_id'=>$request->package,
            'start_date'=>$dated,
            'count_week'=>$request->countday,
            'day_type'=>(int)$request->DayType,
            'branch_id'=>$request->branch,
            'user_id'=>Null,
            'name'=>$request->name,
            'last_name'=>$request->lastname,
            'phonenumber'=>$request->phonenumber,
            'stage'=>0

        ]);
        if(isset($request->days)) {
            $reserve->days()->attach($days);
        }

        $json=['PackageID'=>(int)$request->package,"StartDate"=>$dated,"SessionCountInWeek"=>(int)$request->countday,"DayType"=>(int)$request->DayType,'ExceptDays'=>$dayha,'id'=>(int)$request->branch,'Token'=>$token];
/*        ,'UserName'=>$request->name.$request->last_name.$request->phonenumber*/
        $json=json_encode($json);
        // $json="Params=".$json;
        $res=senddataresreve($json);
        $res=json_decode($res);
        $res=json_decode($res);
        $name=$request->name;
        $last_name=$request->lastname;
        $phonenumber=$request->phonenumber;
        // dd($res);
        return view('request.request_final',compact('res','reserve','days','dy','name','last_name','phonenumber','menus'));
        /*dd($res->ReservationDetailList);*/
    }

    public function profile()
    {
        return view('user.profile.profile_index');
    }
}
