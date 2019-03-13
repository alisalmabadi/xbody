<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('admin.message.index' , compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
            'lastname' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
            'phonenumber' =>'required|numeric|digits:11',
            'title' => 'required|max:100',
            'text' => 'required|max:255'
        ],[
            'name.required' => 'وارد نمودن نام الزامی ست',
            'name.regex' => 'لطفا فقط کاراکتر وارد کنید',
            'name.max' => 'بیش از حد مجاز',
            'lastname.required' => 'وارد نمودن نام خانوادگی الزامی ست',
            'lastname.regex' => 'لطفا فقط کاراکتر وارد کنید',
            'lastname.max' => 'بیش از حد مجاز',
            'phonenumber.required' => 'وارد نمودن شماره تلفن همراه معتبر الزامی ست',
            'phonenumber.numeric' =>'لطفا فقط عدد وارد کنید',
            'phonenumber.digits' => 'شماره تلفن وارد شده صحیح نمیباشد',
            'title.required' => 'وراد کردن عنوان پیام الزامی ست',
            'title.max' => 'بیش از حد مجاز',
            'text.required' => 'وارد کردن پیام الزامی ست',
            'text.max' => 'بیش از حد مجاز'
        ]);

        $message = new Message();
        $message->create($request->all());
        return response('message stored !');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::destroy($id);
        flash('حذف گردید');
        return redirect()->route('admin.message.index');
    }

    public function changeStatus(Request $request)
    {
        $message = Message::find($request['id']);
        $message->update(['status' => $request['value']]);
        return response($message->id);
    }
}
