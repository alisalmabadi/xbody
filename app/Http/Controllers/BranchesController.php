<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        return view('admin.branch.index' , compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orginal_id = Branch::max('orginal_id');
        $orginal_id += 1;
        return view('admin.branch.create' , compact('orginal_id'));
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
            'name'=>'required',
            'orginal_id' => 'required',
            'address' => 'required',
            'manager_name' => 'required',
            'phone' => 'required|numeric',
            'image_original' => 'required|image|mimes:jpg,jpeg,png',
            'page_url' => 'required|max:255'
        ],[
            'name.required' => 'وارد کردن نام الزامی ست',
            'orginal_id.required' => 'مشکلی در محاسبه آی دی بموجود آمده است، لطفا مجدد تلاش کنید',
            'address.required' => 'وارد کردن ادرس الزامی ست',
            'manager_name.required' => 'وارد کردن نام مدیر الزامی ست',
            'phone.required' => 'وارد کردن تلفن الزامی ست',
            'phone.numeric' => 'شماره تلفن وارد شده صحیح نمی باشد',
            'image_original.required' => 'انتخاب تصویر برای شعبه الزامی ست',
            'image_original.image' => 'پسوند تصویر انتخاب شده صحیح نمی باشد',
            'image_original.mimes' => 'پسوند تصویر انتخاب شده صحیح نمی باشد',
            'page_url.required' => 'وارد کردن ادرس یو ار ال صفحه الزامی ست',
            'page_url.max' => 'تعداد کاراکتر یو ار ال وارد شده بیش از حد مجاز می باشد'
        ]);

        /*upload e aks*/
        $imageName = $request['name'] .'_'.time().'.'.$request['image_original']->getClientOriginalExtension();
        $image_url = 'Branches';
        $request['image_original']->move($image_url , $imageName);

        /*thumbnail picture*/
        $path = public_path('Branches/thumbnail') . "/" . $imageName;
        $img = Image::make(public_path('Branches/') . $imageName)->resize(115,115)->save($path);
        $request['image_thumbnail'] = 'Branches/thumbnail/'.$img->basename;

        /*orginal_id mojadad mohasebe beshe ta moshkeli pish nayad*/
        $orginal_id = Branch::max('orginal_id');
        $orginal_id += 1;
        $request['orginal_id'] = $orginal_id;

        $branch = new Branch();
        $branch->create([
            'name' => $request['name'],
            'orginal_id' => $request['orginal_id'],
            'address' => $request['address'],
            'manager_name' => $request['manager_name'],
            'phone' => $request['phone'],
            'image_thumbnail' => $request['image_thumbnail'],
            'image_original' => $image_url . '/' . $imageName,
            'page_url' => $request['page_url'],
            'page_url' => $request['page_url']
        ]);
        return redirect()->route('admin.branches.index');
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
    public function edit(Branch $branch)
    {
        return view('admin.branch.edit' , compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $this->validate($request , [
            'name'=>'required',
            'address' => 'required',
            'manager_name' => 'required',
            'phone' => 'required|numeric',
            'image_original' => 'nullable|mimes:jpg,jpeg,png',
            'page_url' => 'required|max:255'
        ],[
            'name.required' => 'وارد کردن نام الزامی ست',
            'address.required' => 'وارد کردن ادرس الزامی ست',
            'manager_name.required' => 'وارد کردن نام مدیر الزامی ست',
            'phone.required' => 'وارد کردن تلفن الزامی ست',
            'phone.numeric' => 'شماره تلفن وارد شده صحیح نمی باشد',
            'image_original.mimes' => 'تصویر انتخاب شده فرمت مناسبی ندارد',
            'page_url.required' => 'وارد نمودن یو ار ال شعبه الزامی ست',
            'page_url.max' => 'تعداد کاراکتر وارد شده برای این فیلد بیش از حد مجاز است'
        ]);

        /*if image should be uploaded again*/
        if($request['image_original'])
        {
            /*upload e aks*/
            $imageName = $request['name'] .'_'.time().'.'.$request['image_original']->getClientOriginalExtension();
            $image_url = 'Branches';
            $request['image_original']->move($image_url , $imageName);

            /*thumbnail picture*/
            $path = public_path('Branches/thumbnail') . "/" . $imageName;
            $img = Image::make(public_path('Branches/') . $imageName)->resize(115,115)->save($path);
            $request['image_thumbnail'] = 'Branches/thumbnail/'.$img->basename;

            $branch->update(['image_original' => $image_url . '/' . $imageName]);
        }

        $branch->update($request->except(['image_original']));
        return redirect()->route('admin.branches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $branch = new Branch();
        $branch->destroy($request->input('selected' ));
        flash('شعبه حدف شد','danger');
        return back();
    }
}
