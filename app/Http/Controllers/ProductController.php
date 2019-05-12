<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeGroup;
use App\Category;
use App\Comment;
/*use App\Company;*/
use App\Product;
use App\Keyword;
use App\Menu;
use App\Cart;
use App\ProductVarietyValue;
use App\Seller;
use App\Slider;
use App\Variety;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin')->except(['show','getvalue','add_to_cart','get_att_by_value','cart_count','variety_load','cart_del_coockie','mobshow','mobproductindex','index_page','show_p']);

    }

    public function show(Product $product,Comment $comment)
    { 	$menus=Menu::all();
        $varieties =[];
        $variety_sel=array();
        if($product->product_variety_values->first())
        {
            $variety_ids = [];
            $variety_ids_flaten = [];
            $acive_list=array();
            foreach ($product->product_variety_values as $v_v) {
                $variety_ids = array_prepend($variety_ids, array_sort(array_pluck($v_v->variety_options, 'id'), function ($value) {
                    return $value['id'];
                }));
            }

            $variety_ids_flaten=array_unique(array_flatten($variety_ids));
            $variety_sel=$product->product_variety_values->first();
            $slelected_p_v = array_pluck($variety_sel->variety_options, 'id');
            foreach ($product->category->varieties as $variety)
            {
                $variety_temp=['v_id'=>$variety->id,'v_name'=>$variety->name,'v_options'=>array()];
                $selected='';
                $options_ids = array_pluck($variety->variety_options, 'id');

                $varity_ops=array();

                foreach ($variety->variety_options as $v_option) {

                    if (in_array($v_option->id, $variety_ids_flaten))
                    {
                        $active=false;
                       if(in_array($v_option->id,$slelected_p_v))
                       {
                           $selected=$v_option->id;
                           $active=true;
                       }


                        $temp =$acive_list;
                        $temp[]=$v_option->id;

                        $disable=$this->check($variety_ids,$temp);

                        $varity_ops[]= ['op_id'=>$v_option->id,'op_name'=>$v_option->title,'active'=>$active,'disable'=>$disable];
                    }

            }
                $variety_temp['v_options']=$varity_ops;
                $varieties[]=$variety_temp;
                if($selected !='')
                $acive_list[]=$selected;

        }

}

        return  Response::view('product.index',compact('product','menus','varieties','variety_sel','comments'))->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }



    public function mobshow(Product $product)
    { 	$menus=Menu::all();
        $varieties =[];
        $variety_sel=array();
        if($product->product_variety_values->first())
        {
            $variety_ids = [];
            $variety_ids_flaten = [];
            $acive_list=array();
            foreach ($product->product_variety_values as $v_v) {
                $variety_ids = array_prepend($variety_ids, array_sort(array_pluck($v_v->variety_options, 'id'), function ($value) {
                    return $value['id'];
                }));
            }

            $variety_ids_flaten=array_unique(array_flatten($variety_ids));
            $variety_sel=$product->product_variety_values->first();
            $slelected_p_v = array_pluck($variety_sel->variety_options, 'id');
            foreach ($product->category->varieties as $variety)
            {
                $variety_temp=['v_id'=>$variety->id,'v_name'=>$variety->name,'v_options'=>array()];
                $selected='';
                $options_ids = array_pluck($variety->variety_options, 'id');

                $varity_ops=array();

                foreach ($variety->variety_options as $v_option) {

                    if (in_array($v_option->id, $variety_ids_flaten))
                    {
                        $active=false;
                        if(in_array($v_option->id,$slelected_p_v))
                        {
                            $selected=$v_option->id;
                            $active=true;
                        }


                        $temp =$acive_list;
                        $temp[]=$v_option->id;

                        $disable=$this->check($variety_ids,$temp);

                        $varity_ops[]= ['op_id'=>$v_option->id,'op_name'=>$v_option->title,'active'=>$active,'disable'=>$disable];
                    }

                }
                $variety_temp['v_options']=$varity_ops;
                $varieties[]=$variety_temp;
                if($selected !='')
                    $acive_list[]=$selected;

            }

        }


       //$product_id=$product->id;

        //$comments=Comment::where([['status',1],['product_id',$product_id]]);
        return  Response::view('product.index',compact('product','menus','varieties','variety_sel','comments','count_comment'))->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

    }

    public function check($variety_ids , $temp)
    {

        foreach ($variety_ids as $variety_id)
        {
            $flag=true;
            foreach ($temp as $t_id)
            {
                if(!in_array($t_id,$variety_id))
                {
                    $flag=false;
                    break;
                }
            }
            if($flag)
            {
                return false;
            }

        }
        return true;

}


    public function getvalue(Request $request,Product $product)
    {
        $product->load('product_values');
        $product->load('attribute_option');
        $opts=$product->attribute_option;
        $opts=array_pluck($opts,'id');
        $product->load(['attributes'=>function($q) use ($opts){
            $q->with(['attribute_options'=>function($qq) use($opts){

                $qq->whereIn('id',$opts);
            }]);

        }]);

        $aa= array_pluck($product->attributes,'attribute_options');
        $attes=  Arr::crossJoin(...$aa);
        foreach($attes as $key=>$att)
        {
            $flag=true;
            foreach (array_pluck($request->all(),'op_id') as $att_opt)
            {
                if(!in_array($att_opt,array_pluck($att,'id')))
                {
                    $flag=false;}
            }
            if($flag)
            {
                return $key;
            }
        }


    }

    public function get_att_by_value($id,$index)
    {

        $product = Product::where('id','=',$id)->first();

        $product->load('product_values');

        $product->load('attribute_option');

        $opts=$product->attribute_option;

        $opts=array_pluck($opts,'id');
        $product->load(['attributes'=>function($q) use ($opts){
            $q->with(['attribute_options'=>function($qq) use($opts){
                $qq->whereIn('id',$opts);
            }]);
        }]);
        $aa= array_pluck($product->attributes,'attribute_options');
        $attes=  Arr::crossJoin(...$aa);

        return $attes[$index];


    }
    public function index()
    {
/*        $companies=Company::all();*/
        $categories=Category::all();
        $products=Product::all();
        return view('admin.product.product_show',compact('companies','categories','products'));
    }

    public function create()
    {
/*        $companies=Company::all();*/
        $categories=Category::all();
        $keywords=Keyword::all();
/*        $sellers=Seller::all();*/
//		$attribute_groups=AttributeGroup::all();
//		$attribute_groups->load('attributes');
//		$attributes=Attribute::all();
//		$attributes->load('attribute_options');
        return view('admin.product.product_add',compact('companies','categories','keywords','sellers'));
    }

    public function edit(Product $product)
    {
/*        $companies=Company::all();*/
        $categories=Category::all();
/*        $sellers=Seller::all();*/
        $keywords=Keyword::all();
        $product->load('category.attribute_groups.attributes.attribute_options');
        $product->load('images');
        $product->load('keywords');
        return view('admin.product.product_edit',compact('categories','keywords','product'));
    }

    public function slug(Request $request)
    {
        $validator=\Validator::make($request->all(),[
            'slug'=>'required|unique:products'
        ]);
        if($validator->passes())
        {
            return 1;
        }else
            return 0;
    }

    public function store(Request $request)
    {
        $messages=array(
            'name.required'=>'وارد کردن نام کالا الزامی است',
            'price.required'=>'وارد کردن نام کالا الزامی است',
            'title.required'=>'وارد کردن عنوان کالا الزامی است',
            'deductible.required'=>'وارد کردن وضعت کسر کالا الزامی است',
            'slug.required'=>'وارد کردن کلید ادرس یکتا الزامی است',
            'slug.unique'=>'کلید ادرس یکتا تکراری است',
            'category_id.not_in'=>'دسته کالا درست انتخاب نشده !',
        );

        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'title'=>'required',
            'slug'=>'required|unique:products',
            'category_id'=>'required|not_in:0',

        ],$messages);
//

        $product=new Product();
        //create product
        $product=$product->create($request->except(['images','keywords','spec']));
        //slider images import
//		if($request->images)
//		$product->images()->attach($images);

//		$product->attributes()->attach(array_pluck($spec,'attribute_id'));
//		$product->attribute_option()->attach(array_collapse(array_pluck($spec,'attribute_opts')));
//		foreach ($spec_vals as $key=>$spec_val)
//		{
//			$pvalue=$product->product_values()->create([
//				'index'=>$key,
//				'price'=>str_replace(',','',$spec_val['price']),
//				'buy_price'=>str_replace(',','',$spec_val['buy_price']),
//				'count'=>$spec_val['count']
//			]);
//			$pvalue->images()->attach($request->sp_img[$key]);
//		}
        $final_list=array();
        $keywords=array();
        if($request->get('keywords')){
            $keywords=$request->get('keywords');
        }
        foreach ($keywords as $keyword)
        {
            if (!is_numeric($keyword))
            {
                $key= new Keyword();
                $nkey= $key->create(['name'=>$keyword]);
                $final_list=array_add($final_list,count($final_list ),$nkey->id);
            } else
            {
                $final_list=array_add( $final_list,count($final_list),$keyword);
            }
        }
        $product->keywords()->attach($final_list);
        flashs('کالا افزوده شد خصوصیات و تنوع های ان تکمیل شود.','success');
        return redirect(route('admin.product.edit',$product));

    }

    public function update(Request $request,Product $product)
    {
        $messages=array(
            'name.required'=>'وارد کردن نام کالا الزامی است',
            'title.required'=>'وارد کردن عنوان کالا الزامی است',
            'count.required'=>'وارد کردن تعداد کالا الزامی است(اگر کالا دارای خصوصیت میباشد صفر وارد شود)',
            'price.required'=>'وارد کردن قیمت کالا الزامی است.',
            'deductible.required'=>'وارد کردن وضعت کسر کالا الزامی است',
            'slug.required'=>'وارد کردن کلید ادرس یکتا الزامی است',
            'slug.unique'=>'کلید ادرس یکتا تکراری است',
            'category_id.not_in'=>'دسته کالا انتخاب نشده !',
            'spec.*.value.required'=>'!وارد کردن مقدار برای خصوصیت الزامی میباشد',
            'spec_val.*.price.required'=>'وارد کردن قیمت ها الزامی میباشد !',
            'spec_val.*.buy_price.required'=>'وارد کردن قیمت های خرید الزامی میباشد !',

        );
        if($product->slug!=$request->slug)
        {
            $this->validate($request,[
                'name'=>'required',
                'title'=>'required',
                'slug'=>'required|unique:products',
               // 'category_id'=>'required|not_in:0',
                'spec'=>'array',
                'spec.*.value'=>'required',
                'price'=>'required'

            ],$messages);
        }else
        {
            $this->validate($request,[
                'name'=>'required',
                'title'=>'required',
                //'category_id'=>'required|not_in:0',
                'spec'=>'array',
                'spec.*.value'=>'required',
                'price'=>'required'
            ],$messages);

        }
        $images=$request->images;
        $specs=array();


        if($request->spec)
        {$specs=$request->spec;}

        //create product
        $product->update($request->except(['images','keywords','spec','category_id']));

        //slider images import
        $product->images()->sync($images);



        $product->product_attribute_values()->delete();

        foreach ($specs as $key=>$spec)
        {
            $pvalue=$product->product_attribute_values()->create([
                'attribute_id'=>$spec['att_id'],
                'value'=>$spec['value']
            ]);

        }
        $final_list=array();
        $keywords=$request->get('keywords');
        if($keywords)
        {

            foreach ($keywords as $keyword)
            {
                if (!is_numeric($keyword))
                {
                    $key= new Keyword();
                    $nkey= $key->create(['name'=>$keyword]);
                    $final_list=array_add($final_list,count($final_list ),$nkey->id);
                } else
                {
                    $final_list=array_add( $final_list,count($final_list),$keyword);
                }
            }
        }

        $product->keywords()->sync($final_list);

        flashs('کالا بروز رسانی شد.','success');
        return redirect(route('admin.product.index'));

    }

    public function variety_register(Request $request,Product $product)
    {
        $productvarity=$product->product_variety_values()->create($request->except('vopt'));

        $productvarity->variety_options()->attach($request->vopt);
        return back();

    }

    public function variety_remove(Request $request,$id)
    {
        $res=ProductVarietyValue::where('id',$id)->first()->delete();
        return back();

    }

    public function variety_update_form(Request $request,ProductVarietyValue $productVarietyValue,Product $product)
    {


        $html='';

        $html.='<div class="modal-header">';
        $html.='<button class="close" data-dismiss="modal">&times;</button>';
        $html.='<h4 class="modal-title">ویرایش تنوع </h4>';
        $html.='</div>';
        $html.='<div class="modal-body">';
        $html.=' <form id="varity_update_form" action="'.route('admin.product.variety_update',[$productVarietyValue,$product]).'" method="post" class="form-horizontal">';
        $html.=csrf_field();
        foreach($product->category->varieties as $variety)
        {
            $html .= '<div class="form-group">';
            $html .= '<label  class="col-md-4 control-label">'.$variety->name.'</label>';

            $html .= ' <div class="col-md-6">';
            $html .= ' <select name="vopt[]" id="">';
            foreach ($variety->variety_options as $option)
            {

                $old=$productVarietyValue->variety_options;
                $old=array_pluck($old,'id');
                $sel=in_array($option->id,$old)? 'selected':' ';
                $html .= ' <option value="'.$option->id.'" '.$sel.' >'.$option->title.'</option>';

            }

            $html.=' </select>';


            $html.=' </div>';
            $html.='</div>';
        }

        $html.=' <div class="form-group">';
        $html.=' <label  class="col-md-4 control-label">قیمت خرید</label>';

        $html.='<div class="col-md-6">';
        $html.=' <input type="text" name="buy_price" class="form-control" value="'.$productVarietyValue->buy_price.'">';


        $html.='</div>';
        $html.='</div>';
        $html.='<div class="form-group">';
        $html.=' <label  class="col-md-4 control-label">قیمت فروش</label>';

        $html.=' <div class="col-md-6">';
        $html.=' <input type="text" name="price" class="form-control" value="'.$productVarietyValue->price.'">';


        $html.=' </div>';
        $html.='</div>';

        $html.='<div class="form-group">';
        $html.='<label  class="col-md-4 control-label">تعداد موجودی</label>';

        $html.=' <div class="col-md-6">';
        $html.=' <input type="text" name="count" class="form-control" value="'.$productVarietyValue->count.'">';


        $html.='</div>';
        $html.='   </div>';


        $html.='</form>';
        $html.='</div>';
        $html.='<div class="modal-footer">';
        $html.='<button class="btn btn-danger" data-dismiss="modal">بستن</button>';
        $html.='<a href="javascript:;" onclick="$(\'#varity_update_form\').submit();" class="btn btn-primary">ویرایش تنوع</a>';
        $html.='</div>';

        return $html;


    }
    public function variety_update(Request $request,ProductVarietyValue $productVarietyValue,Product $product)
    {
        $productVarietyValue->update($request->except('vopt'));

        $productVarietyValue->variety_options()->sync($request->vopt);
        return back();
    }
    public function copy(Request $request,Product $product)
    {

        $product_new=$product->replicate();
        $product_new->slug= $product_new->slug.'copy'.rand(100,1600);
        $product_new->push();


        //load relations on EXISTING MODEL
        $product->load('images','keywords','product_attribute_values','product_variety_values'
        );

        //re-sync everything
//        foreach ($product->getRelations() as $relationName => $values){
//            $product_new->{$relationName}()->sync($values);
//        }

        foreach($product->getRelations() as $relation => $items) {
            foreach ($items as $item) {
                unset($item->id);
                $product_new->{$relation}()->create($item->toArray());
            }
        }



        return redirect(route('admin.product.edit',$product_new));

    }


    public function destroy(Request $request)
    {
        $products=new Product();

        $products->destroy($request->input('selected' ));

        flashs('کالا حذف شد','success');

        return back();

    }

    public function filter(Request $request)
    {
        $search=$request->r_search;
        $category_id=$request->r_category_id;

        if($category_id==0)
            $filter=[['name','LIKE','%'.$search.'%']];
        else
            $filter=[['name','LIKE','%'.$search.'%'],['category_id','=',$category_id]];


        $products=Product::where($filter)->get();

        return $products;


    }

    public function specification(Request $request)
    {
        $spec=$request->spec;
        $spec=array_sort_recursive($spec);
        //$spec=[["attribute_id"=>"1","attribute_opts"=>["1","2"]],["attribute_id"=>"2","attribute_opts"=>["4"]]];
        $att=new Attribute();
        $params=array_collapse(array_pluck($spec,'attribute_opts'));
        $atts= $att->whereIn('id',array_pluck($spec,'attribute_id'))->with(['attribute_options'=>function($q) use ($params) {
            $q->whereIn('id',$params);
        }])->get();
        $aa= array_pluck($atts,'attribute_options');
        return  Arr::crossJoin(...$aa);
        return 1;



    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add_to_cart(Request $request)
    {

        if(\Auth::guard('web')->check())
        {
            $user =\Auth::guard('web')->user();

            if(Cart::Where([['product_id','=',$request->p_id],['user_id','=',$user->id],['product_variety_value_id',$request->main_variety],['type_id',1]])->exists())
            {
                $cart=Cart::Where([['product_id','=',$request->p_id],['user_id','=',$user->id],['product_variety_value_id',$request->main_variety],['type_id',1]])->first();
                $cart->update(['count'=>$cart->count+1]);

            }
            else
            {
                Cart::create(array('user_id'=>$user->id,
                    'product_variety_value_id'=>$request->main_variety,
                    'product_id'=>$request->p_id,
                    'type_id'=>1,
                    'count'=>1
                ));
            }
            return redirect(route('user.cart'));
        }else
        {
            if(\Cookie::get("carts"))
            {

                $json_str = \Cookie::get("carts");
                $rearr = json_decode($json_str);
                $flag=true;

                foreach($rearr as $obj)
                {

                    if($obj->p_id==$request->p_id && $obj->variety_id==$request->main_variety)
                    {
                        $obj->count++;
                        $flag=false;
                    }

                }
                if($flag)
                {
                    $arr = ['p_id'=>$request->p_id,'variety_id'=>$request->main_variety,'count'=>1,'price'=>ProductVarietyValue::where('id',$request->main_variety)->first()->price];
                    $rearr=array_add($rearr,count($rearr),$arr);

                }
                $rearrsq=json_encode($rearr);
                $cookie=cookie('carts',$rearrsq,500);
                return \Redirect::to(route('user.cart'))->withCookie($cookie);
            }else
            {
                $arr = [['p_id'=>$request->p_id,'variety_id'=>$request->main_variety,'count'=>1,'price'=>ProductVarietyValue::where('id',$request->main_variety)->first()->price]];
                $json_strr = json_encode($arr);
                $cookie=cookie('carts',$json_strr,500);
                return \Redirect::to(route('user.cart'))->withCookie($cookie);
            }

            return \redirect(route('user.cart'));

        }


    }

    public function cart_count(Request $request,Cart $cart)
    {
        $count=$cart->count;
        if($request->mode==1)
        {
            $cart->update(['count'=>$cart->count+1]);
        }
        else if($count>1 && $request->mode==0)
        {

            $cart->update(['count'=>$cart->count-1]);
        }elseif($request->mode==3)
        {
            $cart->delete();
        }



    }
    public function cart_del_coockie(Request $request)
    {
        if(\Cookie::get("carts"))
        {

            $json_str = \Cookie::get("carts");
            $rearr = json_decode($json_str);
            $flag=true;

            foreach($rearr as $key=>$obj)
            {

                if($obj->p_id==$request->p_id && $obj->variety_id==$request->main_variety)
                {
                    unset($rearr[$key]);
                }

            }

            $rearrsq=json_encode($rearr);
            $cookie=cookie('carts',$rearrsq,500);
            return \Redirect::to(route('user.cart'))->withCookie($cookie);
        }



    }

    public function variety_load(Request $request,Product $product)
    {

        $varieties =[];
        $selected= $request->spec;
        $selected_option=$request->selected_option;
        $selected=array_values(array_sort(array_flatten($selected),function ($value){return $value;}));


        if($product->product_variety_values->first())
        {
            $variety_ids = [];
            $variety_ids_flaten = [];
            $acive_list=array();
            $variety_sel =array();


            foreach ($product->product_variety_values as $v_v) {

                $variety_ids = array_prepend($variety_ids,array_values( array_sort(array_pluck($v_v->variety_options, 'id'), function ($value) {
                    return $value;
                })));

            }

            $s= new Slider();

            $variety_ids_flaten=array_unique(array_flatten($variety_ids));
            $slelected_p_v=array();
            if(in_array($selected,$variety_ids))
            {
                $slelected_p_v=$selected;

                $variety_sel=$product->product_variety_values()->whereHas('variety_options',function($q) use($selected){


                        $q->whereIn('id',$selected);



                }, '=', count($selected))->first();

            }else
            {

                $variety_sel=$product->product_variety_values()->whereHas('variety_options',function($q) use($selected_option){
                    $q->where('id',$selected_option);
                })->first();
                $slelected_p_v = array_pluck($variety_sel->variety_options, 'id');

            }




            foreach ($product->category->varieties as $variety)
            {
                $variety_temp=['v_id'=>$variety->id,'v_name'=>$variety->name,'v_options'=>array()];
                $selected='';
                $options_ids = array_pluck($variety->variety_options, 'id');

                $varity_ops=array();

                foreach ($variety->variety_options as $v_option) {

                    if (in_array($v_option->id, $variety_ids_flaten))
                    {
                        $active=false;
                        if(in_array($v_option->id,$slelected_p_v))
                        {
                            $selected=$v_option->id;
                            $active=true;
                        }


                        $temp =$acive_list;
                        $temp[]=$v_option->id;

                        $disable=$this->check($variety_ids,$temp);

                        $varity_ops[]= ['op_id'=>$v_option->id,'op_name'=>$v_option->title,'active'=>$active,'disable'=>$disable];
                    }

                }
                $variety_temp['v_options']=$varity_ops;
                $varieties[]=$variety_temp;
                if($selected !='')
                    $acive_list[]=$selected;

            }

            return  Response::view('product.variety_load',compact('product','menus','varieties','variety_sel'))->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

        }




    }

    public function show_p($slug)
    {
        $product_related=Product::all();
        $products=Product::where('slug',$slug)->first();
        if($products) {
            return view('product.show', compact('products', 'menus', 'product_related'));
        }else{
            abort(404);
        }
    }

    public function index_page()
    {
        $products=Product::all();
        return view('product.index',compact('products','menus'));
    }
}
