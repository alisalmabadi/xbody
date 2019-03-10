<?php

namespace App\Http\Controllers;

use App\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
        $this->middleware('web');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads=Ads::all();
        return view('admin.ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.ads_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'alt'=>'required',
            'url'=>'required',
            'order'=>'required',
            'status'=>'required',
            'image'=>'required'

        ],[
            'title.required'=>'عنوان را وارد کنید.',
            'alt.required'=>'توضیحات عکس را وارد کنید.',
            'url.required'=>'آدرس تبلیغ را وارد کنید.',
            'order.required'=>'ترتیب را وارد کنید.',
            'status.required'=>'وضعیت اجباری است',
            'image.required'=>'تصویر اجباری است.'

        ]);
        $ads=Ads::create($request->except('image'));
        $image=$request->file('image');
        $imagename=sha1($image->getClientOriginalName()).time();
        $imagemime=$image->getClientOriginalExtension();
        $name=$imagename.'.'.$imagemime;
        $image->move('images/setting/',$name);

        $ads->update(['image'=>'images/setting/'.$name]);
        flashs('تبلیغ مورد نطر افزوده شد.');
        return redirect(route('admin.ads.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads=Ads::find($id);
        return view('admin.ads.ads_edit',compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $ads=Ads::find($request->ads_id);
        $this->validate($request,[
            'title'=>'required',
            'alt'=>'required',
            'url'=>'required',
            'order'=>'required',
            'status'=>'required',
            'image'=>'required'

        ],[
            'title.required'=>'عنوان را وارد کنید.',
            'alt.required'=>'توضیحات عکس را وارد کنید.',
            'url.required'=>'آدرس تبلیغ را وارد کنید.',
            'order.required'=>'ترتیب را وارد کنید.',
            'status.required'=>'وضعیت اجباری است',
            'image.required'=>'تصویر اجباری است.'

        ]);
        $ads->update($request->except('image'));
        $image=$request->file('image');
        $imagename=sha1($image->getClientOriginalName()).time();
        $imagemime=$image->getClientOriginalExtension();
        $name=$imagename.'.'.$imagemime;
        $image->move('images/setting/',$name);

        $ads->update(['image'=>'images/setting/'.$name]);
        flashs('تبلیغ مورد نطر ویرایش شد.');
        return redirect(route('admin.ads.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads,Request $request)
    {
        $ads->destroy($request->input('selected'));
        flashs('تبلیغات پاک شدند.','success');
        return back();
    }
}
