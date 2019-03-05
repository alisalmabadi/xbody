<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $article_categories=ArticleCategory::all();
        return view('admin.blog.article_category_show',compact('article_categories'));

    }

    public function create()
    {
        return view('admin.blog.article_category_add');

    }


    public function store(Request $request)
    {
      // dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required|unique:article_categories',
            'img'=>'required',

        ],['name.required'=>'وارد کردن نام برای دسته الزامی است','slug.unique'=>'این نام باید یکتا باشد']);


        $article_category = ArticleCategory::create([

            'name'=>$request->name,
            'slug'=>$request->slug,
            'img'=>$request->img


        ]);

        flashs('دسته مقاله ثبت شد','success');
        return back();
    }

    public function update(Request $request,ArticleCategory $articleCategory)
    {

        if($articleCategory->slug!=$request->slug)
        {
            $this->validate($request,[
                'name'=>'required',
                'img'=>'required',
                'slug'=>'required|unique:categories'

            ],['name.required'=>'وارد کردن نام برای دسته الزامی است','slug.unique'=>'این نام باید همتا باشد']);
            $articleCategory->update(['name'=>$request->name,'slug'=>$request->slug,'img'=>$request->img]);
        }else
        {
            $this->validate($request,[
                'name'=>'required',
                'img'=>'required',

            ],['name.required'=>'وارد کردن نام برای دسته الزامی است','slug.unique'=>'این نام باید همتا باشد']);

            $articleCategory->update(['name'=>$request->name,'img'=>$request->img]);

        }







        flash('دسته مقاله ویرایش شد','success');
        return redirect(route('admin.article_category.index'));

    }
    public function edit(ArticleCategory $articleCategory) {


        $article_category=$articleCategory;

        return view('admin.blog.article_category_edit',compact('article_category'));



    }


    public function destroy(Request $request)
    {
        $category=new ArticleCategory();
        $category->destroy($request->input('selected' ));
        flashs('دسته مقاله حذف شد','danger');
        return back();

    }
    public function slug(Request $request)
    {
        $validator=\Validator::make($request->all(),[
            'slug'=>'required|unique:article_categories'
        ]);
        if($validator->passes())
        {
            return 1;
        }else
            return 0;

    }


}
