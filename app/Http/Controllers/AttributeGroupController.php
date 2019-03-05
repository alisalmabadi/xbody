<?php

namespace App\Http\Controllers;

use App\AttributeGroup;
use App\Category;
use Illuminate\Http\Request;

class AttributeGroupController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin');
    }

    public function index()
    {
        $attribute_groups =AttributeGroup::all();

        return view('admin.attribute.group.attribute_group_show',compact('attribute_groups'));
    }

    public function create()
    {	$categories=Category::all();
        return view('admin.attribute.group.attribute_group_add',compact('categories'));

    }
    public function edit(AttributeGroup $attribute_group)
    {
        $categories=Category::all();
        return view('admin.attribute.group.attribute_group_edit',compact('attribute_group','categories'));

    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required|string',
            'desc'=>'nullable|string'

        ],['name.required'=>'وارد کردن نام گروه الزامی است']);

        $attribute_group=new AttributeGroup();
        $attcategories=$request->get('attribute_category_id');

        $attribute_group=$attribute_group->create($request->all());
        $attribute_group->categories()->attach($attcategories);
        flashs('گروه با افزوده شد','success');
        return back();
    }

    public function update(Request $request,AttributeGroup $attribute_group)
    {
        $this->validate($request,[

            'name'=>'required|string',
            'desc'=>'nullable|string'

        ],['name.required'=>'وارد کردن نام گروه الزامی است']);
        $attcategories=$request->get('attribute_category_id');


        $attribute_group->update($request->all());
        $attribute_group->categories()->sync($attcategories);
        flashs('گروه با بروزرسانی شد','success');
        return back();


    }

    public function destroy(Request $request,AttributeGroup $attributeGroup)
    {
        $attribute_groups=$attributeGroup->destroy($request->input('selected'));
        flashs('گروه های خصوصیتی حذف شدند!','danger');
        return back();
	}

}
