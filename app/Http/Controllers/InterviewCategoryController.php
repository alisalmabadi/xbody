<?php

namespace App\Http\Controllers;

use App\InterviewCategory;
use Illuminate\Http\Request;

class InterviewCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = interviewCategory::all();
        return view('admin.interviewCategory.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interviewCategory.create');
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
            'name' => 'required|max:100',
            'slug' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u|max:100'
        ],[
            'name.required' => 'لطفا نام دسته بندی را وارد کنید',
            'name.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'slug.required' => 'لطفا نام انگلیسی را وارد کنید',
            'slug.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'slug.regex' => 'لطفا فقط کاراکتر انگلیسی بدون فاصله وارد کنید'
        ]);

        $category = new InterviewCategory();
        $category->create($request->all());
        return redirect()->route('admin.interviewCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InterviewCategory  $interviewCategory
     * @return \Illuminate\Http\Response
     */
    public function show(InterviewCategory $interviewCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InterviewCategory  $interviewCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(InterviewCategory $interviewCategory)
    {
        return view('admin.interviewCategory.edit' , compact('interviewCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InterviewCategory  $interviewCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InterviewCategory $interviewCategory)
    {
        $this->validate($request , [
            'name' => 'required|max:100',
            'slug' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u|max:100'
        ],[
            'name.required' => 'لطفا نام دسته بندی را وارد کنید',
            'name.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'slug.required' => 'لطفا نام انگلیسی را وارد کنید',
            'slug.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'slug.regex' => 'لطفا فقط کاراکتر انگلیسی بدون فاصله وارد کنید'
        ]);

        $interviewCategory->update($request->all());
        return redirect()->route('admin.interviewCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InterviewCategory  $interviewCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $interviewCategory = new InterviewCategory();
        $interviewCategory->destroy($request->input('selected' ));
        flash('دسته بندی مصاحبه حدف شد','danger');
        return back();
    }
}
