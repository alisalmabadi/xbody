<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeGroup;
use App\AttributeOption;
use App\Category;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function __construct() {
        $this->middleware('admin');

    }

    public function index()
    {
        $attributes=Attribute::all();

        return view('admin.attribute.attribute_show',compact('attributes'));

    }

    public function create( )
    {
        $options= option_types();
        $categories=Category::all();
        $attribute_groups=AttributeGroup::all();
        return view('admin.attribute.attribute_add',compact('attribute_groups','options','categories'));

    }

    public function edit(Attribute $attribute)
    {
        $options= option_types();
        $categories=Category::all();
        $attribute_groups=AttributeGroup::all();

        return view('admin.attribute.attribute_edit',compact('attribute','attribute_groups','options','categories'));

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'Required|string',
            'type'=>'required|numeric|min:1|max:100000',


        ],[['name.required'=>'وارد کردن نام الزامی میباشد'],['type.required'=>'لطفا نوع خصوصیت را انتخاب کنید']]);
        $attg=$request->get('attribute_group_id');



        $attribute =new Attribute();
        $attribute=$attribute->create($request->except('attribute_group_ids'));

        $attribute->attribute_groups()->attach($attg);

        if($request->opt){
            $opts= $request->opt;

            foreach($opts as $opt) {
                if(array_key_exists('image',$opt))
                {

                    $attribute->attribute_options()->create([
                        'title'=>$opt['title'],
                        'order'=>$opt['order'],
                        'image'=>image_upload($opt['image'],'/images/option/')]);
                }else
                {
                    $attribute->attribute_options()->create([
                        'title'=>$opt['title'],
                        'order'=>$opt['order'],
                        'image'=>image_upload(0,'/images/option/')]);
                }
            }
        }
        flashs('خصوصیت افزوده شد.','success');
        return back();
    }

    public function update(Request $request,Attribute $attribute)
    {
        $this->validate($request,[
            'name'=>'Required|string',
            'type'=>'required|numeric|min:1|max:100000',


        ],[['name.required'=>'وارد کردن نام الزامی میباشد'],['type.required'=>'لطفا نوع خصوصیت را انتخاب کنید']]);
        $attg=$request->get('attribute_group_id');

        $opts=array();
        $optids=array();
        if($request->opt)
        {
            $opts=$request->opt ;
            $optids=array_pluck($opts,'id');
        }



        $attribute->update($request->except('attribute_group_ids'));

        $attribute->attribute_groups()->sync($attg);


        foreach ($attribute->attribute_options as $option)
        {
            if(!in_array($option->id,$optids))
            {
                $option->delete();

            }
        }

        if($request->opt){


            foreach($opts as $opt) {

                if($opt['id']=='-1')
                {
                    if(array_key_exists('image',$opt)) {
                        $attribute->attribute_options()->create( [
                            'title' => $opt['title'],
                            'order' => $opt['order'],
                            'image' => image_upload( $opt['image'], '/images/option/' )
                        ] );
                    }else
                    {
                        $attribute->attribute_options()->create( [
                            'title' => $opt['title'],
                            'order' => $opt['order'],
                            'image' => image_upload( 0, '/images/option/' )
                        ] );
                    }
                }else
                {

                    $attribute_option=AttributeOption::where('id',$opt['id'])->first();

                    if(array_key_exists('image',$opt)) {
                        $attribute_option->update([
                            'title' => $opt['title'],
                            'order' => $opt['order'],
                            'image'=>image_upload($opt['image'],'/images/option/')

                        ]);
                    }else
                    {
                        $attribute_option->update( [
                            'title' => $opt['title'],
                            'order' => $opt['order'],

                        ] );

                    }
                }
            }
        }else
        {
            $attribute->attribute_options()->delete();


        }


        flashs('خصوصیت بروز رسانی شد.','success');
        return back();


    }
}
