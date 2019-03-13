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

            $productreserve = ProductReserve::create($request->except('user_id', 'status', 'type'));
//            $productreserve->update([
//                'u'
//            ]);
        $message= 'با سلام و وقت بخیر; محصول مورد نظر شما با موفقیت رزرو گردید. ایکس بادی';
        /*        $message=str_replace('_num_',Convertnumber2english($res->ReserveCode),$message);*/
       // send_sms($request->phonenumber,$message);
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
        //send_sms($user->username,$message);
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
