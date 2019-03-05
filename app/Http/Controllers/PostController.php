<?php

namespace App\Http\Controllers;

use App\CategoryPost;
use App\Keyword;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin')->except(['show_article']);
    }

    public function index()
    {
        $articles=Post::all();
        $article_categories=CategoryPost::all();

        return view('admin.blog.article_show',compact('article_categories','articles'));
    }


    public function create() {
        $article_categories=CategoryPost::all();
        $keywords=Keyword::all();
        //$categories=Category::all();
        return view('admin.blog.article_add',compact('article_categories','keywords'));
    }

    public function store(Request $request)
    {
        $messages=array(

            'title.required'=>'وارد کردن عنوان مقاله الزامی است',


            'slug.required'=>'وارد کردن کلید ادرس یکتا الزامی است',
            'slug.unique'=>'کلید ادرس یکتا تکراری است',
            'article_category_id.not_in'=>'دسته مقاله درست انتخاب نشده !',


        );

        $this->validate($request,[

            'title'=>'required',


            'slug'=>'required|unique:articles',
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

        flash('مقاله ذخیره شد','success');
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






        flash(' مقاله ویرایش شد','success');
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

    public function show_article(Article $article)
    {
        $articles=Article::all();


        $previous =  Article::where('id','=',Article::where('id', '<', $article->id)->max('id'))->first();
        // get next user id
        $next = Article::where('id','=',Article::where('id', '>', $article->id)->min('id'))->first();



        $v=new \Verta($article->created_at);
        $article->created_atp=$v->format('%B %d، %Y');



        return view('article',compact('article','previous','next'));

    }

}
