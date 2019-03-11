<?php

namespace App\Http\Controllers;

use App\ProductReserve;
use App\User;
use Illuminate\Http\Request;

class ProductReserveController extends Controller
{

    public function __construct()
    {
        return $this->middleware('admin')->only('index');
    }
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
            'lastname' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
            'phonenumber' => 'required|numeric|digits:11'
        ],[
            'name.required' => 'لطفا نام خود را وارد کنید',
            'name.regex' => 'در این فیلد فقط کاراکتر وارد کنید',
            'name.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'lastname.required' => 'لطفا نام خانوادگی خود را وارد کنید',
            'lastname.regex' => 'در این فیلد فقط کاراکتر وارد کنید',
            'lastname.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'phonenumber.required' => 'لطفا شماره تلفن همراه خود را وارد کنید',
            'phonenumber.numeric' => 'در این فیلد فقط عدد وارد کنید',
            'phonenumber.digits' => 'شماره تلفن وارد شده صحیح نمی باشد'
        ]);

        $productreserve = ProductReserve::create($request->except('user_id', 'status', 'type'));
//            $productreserve->update([
//                'u'
//            ]);
        $message= 'با سلام و وقت بخیر; محصول مورد نظر شما با موفقیت رزرو گردید. ایکس بادی';
        /*        $message=str_replace('_num_',Convertnumber2english($res->ReserveCode),$message);*/
        send_sms($request->phonenumber,$message);
            $data=json_encode([['product_id'=>$request->product_id,'reserve_id'=>$productreserve->id]]);
            $cookie=cookie('reserved',$data,600);
            return back()->withCookie($cookie);

    }

    public function storeuser(Request $request)
    {
        $productreserve = ProductReserve::create($request->except('user_id', 'status', 'type'));
        $productreserve->update([
            'user_id'=>$request->user_id,
            'type'=>2
        ]);
        $user=User::where('id',$request->user_id)->first();
        $message= 'با سلام و وقت بخیر; محصول مورد نظر شما با موفقیت رزرو گردید. ایکس بادی';
/*        $message=str_replace('_num_',Convertnumber2english($res->ReserveCode),$message);*/
        send_sms($user->username,$message);
        //$productreserve=ProductReserve::where('')
        return back();
    }


    public function index()
    {
        $product_reserves=ProductReserve::orderBy('id','desc')->get();
/*        dd($product_reserves);*/
        return view('admin.product.product_reserves',compact('product_reserves'));
    }

    public function filter(Request $request)
    {
        $product_reserves=ProductReserve::where('type',$request->type)->get();
        return view('admin.product.product_reserves',compact('product_reserves'));
    }


    public function change(Request $request)
    {
        $product_reserves=ProductReserve::where('id',$request->reserve_id)->first();
        $product_reserves->update([
            'status'=>$request->status
        ]);
        flashs('وضیعت رزرو با موفقیت تغییر کرد.','success');

        return redirect(route('admin.product.reservess'));
    }
}
