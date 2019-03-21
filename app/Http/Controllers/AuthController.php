<?php

namespace App\Http\Controllers;
use App\Branch;
use GuzzleHttp\Cookie\SetCookie;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('xAuth', ['only' => 'test','logout']);


    }


    public function login(Request $request)
    {
        $branches=null;
        /*  if(is_null($request->session()->get('user',null))) {
              $branches = getbranches();
              $branches = json_decode($branches, true);
              $branches = json_decode($branches, true);
              dd($branches);
              if(is_null($branches)){
                  return view('errors.database');
              }else{
                  foreach($branches as $branch) {
                      $branchesa = Branch::updateOrCreate(['name'=>$branch['BranchName'],'manager_name'=>$branch['BranchManagerName'],'address'=>$branch['BranchAddress'],'orginal_id'=>$branch['BranchNo'],'phone'=>$branch['BranchTelNumber']]);
                  }
                  return view('auth/login', compact('branches'));
              }
          }else{
              return redirect(route('user.home'));
          }*/

        if(is_null($request->session()->get('user',null))) {
            /*   $branches = getbranches();
             $branches = json_decode($branches, true);
             $branches = json_decode($branches, true);*/
            /* $branches=null;
             if(!is_null($branches)){
                 foreach($branches as $branch) {
                     $branchesa = Branch::updateOrCreate(['name'=>$branch['BranchName'],'manager_name'=>$branch['BranchManagerName'],'address'=>$branch['BranchAddress'],'orginal_id'=>$branch['BranchNo'],'phone'=>$branch['BranchTelNumber']]);
                 }
                 $branchesha=Branch::all();
                 return view('auth/login', compact('branchesha'));

             }elseif($branches==null){
                 $branchesha=Branch::all();
                 return view('auth/login', compact('branchesha'));

             }*/
            $branches=Branch::all();
            return view('auth/login', compact('branches'));
        }else{
            return redirect(route('user.home'));
        }
    }

    public function check_login(Request $request)
    {
        $flag=false;
        $res=[];
        $res = branchusers($request->branchid);
        $res = json_decode($res, true);
        $res = json_decode($res, true);

        if(is_null($res)) {
            return view('errors.database');
        }else{
            foreach ($res as $user) {
                // dd($user);
                if ($user['Mobile'] == $request->username && $user['PResult'] == $request->password) {
                    $flag = true;
                    $result = $user;
                }
            }
            // dd($result);
            if ($flag) {
                session(['authenticated' => true, 'user' => $result]);
                if (User::where([['orginal_id', $result['UserID']], ['branch_id', $result['BranchNo']]])->first() == null) {
                    $gender = ($result['Gender'] == 'مرد') ? 1 : 0;
                    $usersam = User::create([
                        'first_name' => $result['FirstName'],
                        'last_name' => $result['LastName'],
                        'username' => $result['Mobile'],
                        'password' => $result['PResult'],
                        'gender' => $gender,
                        'branch_id' => $result['BranchNo'],
                        'orginal_id' => $result['UserID']
                    ]);
                    //   $cookie=\Cookie('datas',$usersam->id,500);
                    return redirect(route('user.home'));
                } else {
                    session(['authenticated' => true, 'user' => $result]);

                    return redirect(route('user.home'));
                }

            } else {
                $error_array = ['message' => 'نام کاربری و یا رمزعبور اشتباه وارد شده اند.'];
                $json_error = json_encode($error_array);
                $cookie = cookie('error_login', $json_error, 500);
                return back()->withCookie($cookie);
            }
        }
    }

    /* public function users_login(Request $request)
     {

     }*/

    /*public function register()
    {
        return view('auth.register');

    }

    public function check_register(Request $request)
    {
        $this->validate($request,[
           'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'confirm_password'=>'required|same:password',
            'gender'=>'required|numeric'
        ],[
            'password.required'=>'پسورد  وارد نشده است.',
            'password.min'=>'کلمه عبور باید از 8 کلمه بیشتر باشد.',
            'confirm_password.required'=>'تکرار کلمه عبور وارد نشده است.',
            'confirm_password.same'=>'تکرار کلمه عبور با کلمه عبور یکسان نیست.',
            'first_name.required'=>'نام وارد نشده است.',
            'last_name.required'=>'نام خانوادگی وارد نشده است.',
            'email.required'=>'ایمیل وارد نشده است.',
            'email.email'=>'ایمیل صحیح وارد نشده است.',
            'gender.required'=>'جنسیت را انتخاب کنید',
            'gender.numeric'=>'مقادیر جنسیت اشتباه است',
            ]);
        $users=User::where('user_type',2)->get(array('username'));
       // dd(array_pluck($users,'username'));
        if(in_array($request->username,array_pluck($users,'username'))){
            $error_array = ['message' => 'این نام کاربری قبلا انتخاب شده است.'];
            $json_error = json_encode($error_array);
            $cookie = cookie('error_login', $json_error, 500);
            return back()->withCookie($cookie);
        }else{
        $user=User::create([
           'first_name'=>$request->first_name,
           'last_name'=>$request->last_name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'gender'=>$request->gender,
            'user_type'=>2
        ]);
        flashs('ثبت نام شما با موفقیت انجام شد حال میتوانید وارد حساب خود شوید!','success');
        return back();
      //  return url(route('login'));
        }
    }*/

    /*public function test()
    {
        $cookie= \Cookie::get('datas');
       // dd($cookie);
        return view('user.home');
    }*/

    public function logout()
    {
        session()->flush();
        return redirect(route('login'));
    }
}
