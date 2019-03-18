<?php

namespace App\Http\Controllers;
use App\ProductReserve;
use App\Reserve;
use App\User;
use Illuminate\Http\Request;
use Dotenv\Validator;

class ReserveController extends Controller
{
    public function index()
    {
        //$user=User::where([['orginal_id',session()->get('user')['UserID']],['branch_id',session()->get('user')['BranchNo']]])->first();

        return view('user.reserve.reserve_final');
    }

    public function finalreserve(Request $request)
    {

        // dd($request->all());
        $reserve=Reserve::where('id',$request->reserve_id)->first();
        $hour = array_filter($request->hour);
        $hour=array_values($hour);
        $dates=$request->dates;
      // dd($hour,$dates);
        /*foreach ($hour as $h) {
                foreach ($dates as $date) {
                    $reserve->ReserveDetails()->create([
                        'hour' => $h,
                        'date' => $date
                    ]);
                }
        }*/
        $user=User::where([['orginal_id',session()->get('user')['UserID']],['branch_id',session()->get('user')['BranchNo']]])->first();

        foreach (array_combine($dates,$hour) as $date=>$h){
            $reserve->ReserveDetails()->create([
                'hour' => $h,
                'date' => $date
            ]);
        }
        $days=array_pluck($reserve->days,'slug');
        //dd($days);
        $token='c6ef92be07fbd8091aaff53e455f6a24b1bae4d4';
        $json=['PackageID'=>(int)$request->package_id,'UserID'=>$request->user_originalid,"StartDate"=>$request->start_date,"SessionCountInWeek"=>(int)$request->count_week,"DayType"=>(int)$request->day_type,'ReserveCode'=>$request->reserve_id,'ExceptDays'=>$days,'id'=>(int)$request->branch_id,'Token'=>$token,'Shift'=>$hour,'Date'=>$dates];

        $json=json_encode($json);
        $res=SetReservationInfo($json);

      // dd($res);
        $res=json_decode($res);
        if($res!=null) {
            if (!isset($res->Message)) {
                $res = json_decode($res);
            } else {

                if ($res->Message != null) {
                    // dd('false');
                    flashs('مشکلی پیش آمد،لطفا با پشتیبانی تماس حاصل فرمایید.', 'danger');
                    return redirect(route('user.reserves'));
                }
            }

            // $res=json_decode($res);
            //dd($result);
            if (isset($res->Status)) {
                if ($res->Status == 'OK') {
                    $reserve->update(['status' => 1]);
                    $message= 'با سلام و وقت بخیر; رزرو جلسات شما با شماره رزروی _num_ با موفقیت انجام گردید. ایکس بادی';
                    $message=str_replace('_num_',Convertnumber2english($res->ReserveCode),$message);
                   // send_sms($user->username,$message);
                    flashs('رزرو شما با موفقیت انجام شد.', 'success');
                    return redirect(route('user.reserves'));
                } else {
                    flashs('مشکلی در مرحله ثبت در دیتابیس وجود داشته با پشتیبانی تماس بگیرید.', 'danger');
                    return redirect(route('user.reserves'));
                }
            }
        }else{
            flashs('مشکلی (null value) پیش آمد،لطفا با پشتیبانی تماس حاصل فرمایید.', 'danger');
            return redirect(route('user.reserves'));
        }

       // dd($res);

    }
    public function finalreserves(Request $request)
    {
        $this->validate($request,[
            'hour'=>'required',
            'dates'=>'required'
        ],[
            'hour.required'=>'انتخاب ساعت الزامی است.',
            'dates.required'=>'انتخاب تاریخ الزامی است.'
        ]);
        /*if($validator->fails()){
            return \Response::json([$validator->errors()]);
        }*/
        global $resam;
        // dd($request->all());
        $reserve=Reserve::where('id',$request->reserve_id)->first();
        $hour = array_filter($request->hour);
        $hour=array_values($hour);
        $dates=$request->dates;
        // dd($hour,$dates);
        /*foreach ($hour as $h) {
                foreach ($dates as $date) {
                    $reserve->ReserveDetails()->create([
                        'hour' => $h,
                        'date' => $date
                    ]);
                }
        }*/

        foreach (array_combine($dates,$hour) as $date=>$h){
            $reserve->ReserveDetails()->create([
                'hour' => $h,
                'date' => $date
            ]);
        }
        $days=array_pluck($reserve->days,'slug');
        //dd($days);
        $token='c6ef92be07fbd8091aaff53e455f6a24b1bae4d4';
        $json=['PackageID'=>(int)$request->package_id,'UserID'=>0,"StartDate"=>$request->start_date,"SessionCountInWeek"=>(int)$request->count_week,"DayType"=>(int)$request->day_type,'ReserveCode'=>$request->reserve_id,'ExceptDays'=>$days,'id'=>(int)$request->branch_id,'Token'=>$token,'Shift'=>$hour,'Date'=>$dates,'UserName'=>$request->name.','.$request->last_name.','.$request->phonenumber];

        $json=json_encode($json);
        $res=SetReservationInfo($json);

        // dd($res);
        $res=json_decode($res);
        if($res!=null) {
            if (!isset($res->Message)) {
                $res = json_decode($res);
            } else {

                if ($res->Message != null) {
                    // dd('false');
                    $resam=2;
                    return view('request.final',compact('resam','res'));
                }
            }

            // $res=json_decode($res);
            //dd($result);
            if (isset($res->Status)) {
                if ($res->Status == 'OK') {
                    $reserve->update(['status' => 1,'stage'=>0]);
                    $message= 'با سلام و وقت بخیر; رزرو جلسات شما با شماره رزروی _num_ با موفقیت انجام گردید. ایکس بادی';
                    $message=str_replace('_num_',Convertnumber2english($res->ReserveCode),$message);
                    //send_sms($request->phonenumber,$message);
                    $resam=1;
                    return view('request.final',compact('resam','res'));
                } else {
                    $resam=4;
                    $reserve->update(['status' => 2,'stage'=>null]);

                    return view('request.final',compact('resam','res'));
                }
            }
        }else{
            $resam=3;
            $reserve->update(['status' => 4,'stage'=>null]);

            return view('request.final',compact('resam','res'));
        }

        // dd($res);

    }


    public function productreserve()
    {
        $user=User::where([['orginal_id',session()->get('user')['UserID']],['branch_id',session()->get('user')['BranchNo']]])->first();

        $productreserve=ProductReserve::where([['type',2],['user_id',$user->id]])->get();
        return view('user.reserve.product_reserves',compact('productreserve'));
    }


    public function PastReserve()
    {
        $user=User::where([['orginal_id',session()->get('user')['UserID']],['branch_id',session()->get('user')['BranchNo']]])->first();
        $reserves=Reserve::where('user_id',$user->id)->orderBy('id','DESK')->get();
        $reserves->load('ReserveDetails');
       // $reserves=$reserves->ReserveDetails();
      //  dd($reserves);
        return view('user.reserve.all_reserve',compact('reserves'));
    }

    public function lastreserves()
    {
        $user=User::where([['orginal_id',session()->get('user')['UserID']],['branch_id',session()->get('user')['BranchNo']]])->first();

        $reserves=GetTheUserReserve($user->branch_id,$user->orginal_id);

        $reserves=json_decode($reserves);
        $reserves=json_decode($reserves);
        return view('user.reserve.branch_reserves',compact('reserves'));

    }
}
