<?php

namespace App\Http\Controllers;

use App\Interview;
use App\InterviewCategory;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviews = Interview::all();
        foreach($interviews as $i)
        {
            $vid = $i->video;
            $end = strpos($vid , '</script>');
            $whole = substr($vid , 0 , $end);
            $i->new_video = $whole;
        }
        return view('admin.interview.index' , compact('interviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = InterviewCategory::all();
        return view('admin.interview.create' , compact('categories'));
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
            'title' => 'required|max:100',
            'interview_category_id' => 'required|numeric',
            'status' => 'required|numeric',
            'desc' => 'required|max:255',
            'video' => 'required'
        ],[
            'title.required' => 'لطفا عنوان ویدئو را وارد نمایید',
            'title.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز',
            'interview_category_id.required' => 'دسته بندی را انتخاب کنید',
            'interview_category_id.numeric' => 'مشکلی رخ داده، مجددا دسته بندی را انتخاب کنید',
            'status.required' => 'انتخاب وضعیت ویدئو الزامی ست',
            'status.numeric' => 'خطایی رخ داده است, لطفا مجدد وضعیت را مشخص کنید',
            'desc.required' => 'لطفا توضیحاتی برای این ویدئو وارد کنید',
            'desc.max' => 'تعداد کاراکتر وارد شده برای این فیلد بیش از حد مجاز است',
            'video.required' => 'لطفا کد ویدئو را وارد کنید'
        ]);

        $interview = new Interview();
        $interview->create($request->all());

        return redirect()->route('admin.interview.index');
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
    public function edit(Interview $interview)
    {
        $categories = InterviewCategory::all();
        return view('admin.interview.edit' , compact('interview' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interview $interview)
    {
        $this->validate($request , [
            'title' => 'required|max:100',
            'interview_category_id' => 'required|numeric',
            'status' => 'required|numeric',
            'desc' => 'required|max:255',
            'video' => 'required'
        ],[
            'title.required' => 'لطفا عنوان ویدئو را وارد نمایید',
            'title.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز',
            'interview_category_id.required' => 'دسته بندی را انتخاب کنید',
            'interview_category_id.numeric' => 'مشکلی رخ داده، مجددا دسته بندی را انتخاب کنید',
            'status.required' => 'انتخاب وضعیت ویدئو الزامی ست',
            'status.numeric' => 'خطایی رخ داده است, لطفا مجدد وضعیت را مشخص کنید',
            'desc.required' => 'لطفا توضیحاتی برای این ویدئو وارد کنید',
            'desc.max' => 'تعداد کاراکتر وارد شده برای این فیلد بیش از حد مجاز است',
            'video.required' => 'لطفا کد ویدئو را وارد کنید'
        ]);

        $interview->update($request->all());
        return redirect()->route('admin.interview.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $interview = new Interview();
        $interview->destroy($request->input('selected' ));
        flash('مصاحبه حدف شد','danger');
        return back();
    }

    public function changeStatus(Interview $interview)
    {
        if($interview->status == 0)
            $interview->update(['status'=>'1']);
        else
            $interview->update(['status'=>'0']);

        return redirect()->route('admin.interview.index');
    }



    public function index_page()
    {
        $categories = InterviewCategory::all();
        return view('interview.index_page' , compact('categories'));
    }

    public function showByCategory(Request $request)
    {
        $interviews = Interview::where('interview_category_id' , $request['id'])->where('status' , 1)->get();
        return response($interviews);
    }
}
