<?php

namespace App\Http\Controllers;

use App\Category;
use App\Keyword;
use App\Menu;
use App\Slider;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function __construct() {

        $this->middleware('admin')->except('show');
    }

    public function index() {

        $categories=Category::all();


        return view('admin.category.category_show',compact('categories'));


    }

    public function get_categories()
    {
        return $type_list=Category::all(['id','name']);

    }


    public function show(Category $category) {
        $menus=Menu::all();

        $category->load('posts');
        $category->load('sliders');
        $category->load('products');



        $slider=$category->sliders->first();

        return view('category.index',compact('menus','slider','category'));


    }

    public function edit(Category $category) {

        $keywords   = Keyword::all();
        $keyworlist = array();

        foreach ($category->keywords as $keyw)
        {

            $keyworlist=array_add($keyworlist,count($keyworlist),$keyw->id);
        }

        return view('admin.category.category_edit',compact('category','keywords','keyworlist'));



    }

    public function create() {

        $keywords=Keyword::all();
        return view('admin.category.category_add',compact('keywords'));

    }

    public function destroy(Request $request)
    {
        $category=new Category();
        $category->destroy($request->input('selected' ));
        flashs('دسته حذف شد','danger');
        return back();

    }
    public function slug(Request $request)
    {
        $validator=\Validator::make($request->all(),[
            'slug'=>'required|unique:categories'
        ]);
        if($validator->passes())
        {
            return 1;
        }else
            return 0;

    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'title'=>'nullable|string',
            'slug'=>'required|unique:categories'

        ],['name.required'=>'وارد کردن نام برای دسته الزامی است','slug.unique'=>'این نام باید یکتا باشد']);



        $final_list=array();
        $keywords=array();
        if($request->get('keywords')){
            $keywords=$request->get('keywords');}
        foreach ($keywords as $keyword)
        {
            if (!is_numeric( $keyword ) ) {
                $key= new Keyword();
                $nkey= $key->create( [ 'name' => $keyword ] );
                $final_list=array_add( $final_list, count( $final_list ), $nkey->id );
            } else
            {
                $final_list=array_add( $final_list, count( $final_list ), $keyword );
            }
        }
        $category =new Category();
        $cat=$category->create([

            'name'=>$request->name,
            'title'=>$request->title,
            'skill'=>$request->skill,
            'seo_desc'=>$request->seo_desc,
            'slug'=>$request->slug,
            'image'=>$request->image,
            'state'=>($request->state)? '1':'0'

        ]);

        $cat->keywords()->attach($final_list);

        flashs('دسته بندی ثبت شد','success');
        return back();
    }

    public function update(Request $request,Category $category)
    {

        if($category->slug!=$request->slug)
        {
            $this->validate($request,[
                'name'=>'required',
                'title'=>'nullable|string',
                'slug'=>'required|unique:categories'

            ],['name.required'=>'وارد کردن نام برای دسته الزامی است','slug.unique'=>'این نام باید همتا باشد']);
            $cat=$category->update(['name'=>$request->name,'title'=>$request->title,'slug'=>$request->slug,'skill'=>$request->skill,'image'=>$request->image,'seo_desc'=>$request->seo_desc]);
        }else
        {
            $this->validate($request,[
                'name'=>'required',
                'title'=>'nullable|string',

            ],['name.required'=>'وارد کردن نام برای دسته الزامی است','slug.unique'=>'این نام باید همتا باشد']);

            $cat=$category->update(['name'=>$request->name,'title'=>$request->title,'skill'=>$request->skill,'image'=>$request->image,'seo_desc'=>$request->seo_desc,'state'=>($request->state)? '1':'0']);

        }



        $final_list=array();
        if($keywords=$request->get('keywords'))
        {
            $keywords=$request->get('keywords');
            foreach ($keywords as $keyword)
            {
                if (!is_numeric( $keyword ) ) {
                    $key= new Keyword();
                    $nkey= $key->create( [ 'name' => $keyword ] );
                    $final_list=array_add( $final_list, count( $final_list ), $nkey->id );
                } else
                {
                    $final_list=array_add( $final_list, count( $final_list ), $keyword );
                }
            }
        }

        $category->keywords()->sync($final_list);

        flashs('دسته بندی ویرایش شد','success');
        return redirect(route('admin.category.index'));

    }

}
