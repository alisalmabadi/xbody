<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\ArticleCategory;
use App\Article;
use App\Category;
use App\Keyword;
use App\Slider;

class ArticleController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin')->except(['index_page','show','posts']);
    }

    public function index()
    {
        $articles=Article::all();
        $article_categories=ArticleCategory::all();

        return view('admin.blog.article_show',compact('article_categories','articles'));
    }

    public function show($category,$article)
    {
        // dd($article);

            $article = Article::where('slug', $article)->first();
        if($article->article_category->slug==$category) {
            $created = $v = new \Verta($article->created_at);
            $created = $v->format('%B, %d %Y');
            $menus = Menu::all();
            return view('blog.article_show', compact('article', 'menus', 'created'));
        }else{
            abort(404);
        }
    }

    public function index_page()
    {
        $menus=Menu::all();
        $articles=Article::all();
        $article_categories=ArticleCategory::all();
        /*$slider=Slider::where('id',2)->with([
            'slides' => function($q)
            {
                $q->orderBy('order', 'ASC');
            }])->first();*/

        $slider=Slider::where('id',5)->first();
        $slider->load('slides');
        return view('blog.article_all',compact('article_categories','articles','menus','slider'));
    }



    public function create() {
        $article_categories=ArticleCategory::all();
        $keywords=Keyword::all();
        return view('admin.blog.article_add',compact('article_categories','keywords'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $messages=array(

            'title.required'=>'وارد کردن عنوان مقاله الزامی است',
            'slug.required'=>'وارد کردن کلید ادرس یکتا الزامی است',
            'slug.unique'=>'کلید ادرس یکتا تکراری است',
            'article_category_id.not_in'=>'دسته مقاله درست انتخاب نشده !',
            'short.required'=>'خلاصه مطلب ضروری است.',
            'short.max'=>'نباید بیشتر از 100 کاراکتر باشد.'

        );

        $this->validate($request,[

            'title'=>'required',
            'slug'=>'required|unique:articles',
            'short'=>'required|max:100',
            'article_category_id'=>'required|not_in:0',

        ],$messages);

        $article=Article::create($request->all());
        $final_list=array();
        $keywords=array();
        if($request->get('keywords')){
            $keywords=$request->get('keywords');}
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
        $article->keywords()->attach($final_list);

        flashs('مقاله ذخیره شد','success');
        return back();


    }

    public function edit(Article  $article) {
        $article_categories=ArticleCategory::all();

        $keywords=Keyword::all();
        return view('admin.blog.article_edit',compact('article','article_categories','keywords'));

    }
    public function update(Article $article,Request $request)
    {

        $messages=array(

            'title.required'=>'وارد کردن عنوان مقاله الزامی است',


            'slug.required'=>'وارد کردن کلید ادرس یکتا الزامی است',
            'slug.unique'=>'کلید ادرس یکتا تکراری است',
            'article_category_id.not_in'=>'دسته مقاله درست انتخاب نشده !',


        );
        if($article->slug!=$request->slug)
        {
            $this->validate($request,[
                'title'=>'required',

                'seo_desc'=>'nullable',

                'slug'=>'required|unique:articles',
                'article_category_id'=>'required|not_in:0',

            ],$messages);
            $article->update($request->except('keywords'));
        }else
        {
            $this->validate($request,[
                'title'=>'required',

                'seo_desc'=>'nullable',


                'article_category_id'=>'required|not_in:0',

            ],$messages);

            $article->update($request->except(['slug','keywords']));

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

        $article->keywords()->sync($final_list);






        flashs(' مقاله ویرایش شد','success');
        return back();




    }

    public function slug(Request $request)
    {
        $validator=\Validator::make($request->all(),[
            'slug'=>'required|unique:articles'
        ]);
        if($validator->passes())
        {
            return 1;
        }else
            return 0;

    }
    public function filter(Request $request)
    {
        $search=$request->r_search;
        $article_category_id=$request->article_category_id;

        if($article_category_id==0)
            $filter=[['title','LIKE','%'.$search.'%']];
        elseif( $article_category_id!=0)
            $filter=[['title','LIKE','%'.$search.'%'],['article_category_id','=',$article_category_id]];

        $articles=Article::where($filter)->get();
        $articles->load('article_category');
        return $articles;

    }
    public function destroy(Request $request)
    {
        $article=new Article();
        $article->destroy($request->input('selected' ));
        flash('مقاله حدف شد','danger');
        return back();


    }

   /* public function show_article(Article $article)
    {
        $articles=Article::all();


        $previous =  Article::where('id','=',Article::where('id', '<', $article->id)->max('id'))->first();
        // get next user id
        $next = Article::where('id','=',Article::where('id', '>', $article->id)->min('id'))->first();



        $v=new \Verta($article->created_at);
        $article->created_atp=$v->format('%B %d، %Y');



        return view('article',compact('article','previous','next'));

    }*/

    public function posts(Request $request)
    {
      //  return $request->all();
        //dd($request->all());
        if($request->id==0){
            $articles=Article::all();
            $view=view('blog.catarticle',compact('articles'))->render();
            return $view;
        }else{
            $articles=Article::where('article_category_id',$request->id)->get();
            $view=view('blog.catarticle',compact('articles'))->render();
            return $view;

        }
    }



}
