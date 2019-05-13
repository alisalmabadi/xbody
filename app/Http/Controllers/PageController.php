<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Page;
use App\Keyword;
use PhpParser\ParserAbstract;
use Psy\Test\Exception\RuntimeExceptionTest;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('show');
    }

    public function index()
    {
        $pages=Page::all();
        return view('admin.page.page_show',compact('pages'));
    }


    public function show(Page $page)
    {

/*        $menus =Menu::all();*/
        return view('page',compact('page','menus'));

    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'title'=>'nullable|string',
            'slug'=>'required|unique:pages',
            'seo_desc'=>'nullable'

        ],[
        'name.required'=>'وارد کردن نام برای صفحه الزامی است',         'slug.unique'=>'این نام باید یکتا باشد',
         'slug.required'=>'این نام باید یکتا باشد',

        ]);

        $final_list=array();
        $page =new Page();
        $cat=$page->create([
            'name'=>$request->name,
            'title'=>$request->title,
            'seo_desc'=>$request->seo_desc,
            'slug'=>$request->slug,
            'text'=>$request->text,
        ]);
        if($request->keywords) {
            $keywords = $request->get('keywords');
            foreach ($keywords as $keyword) {
                if (!is_numeric($keyword)) {
                    $key = new Keyword();
                    $nkey = $key->create(['name' => $keyword]);
                    $final_list = array_add($final_list, count($final_list), $nkey->id);

                } else {
                    $final_list = array_add($final_list, count($final_list), $keyword);
                }
            }

            $cat->keywords()->attach($final_list);

        }

        flashs('صفحه ایجاد شد','success');
        return back();
    }

    public function create()
    {
        $keywords=Keyword::all();
        return view('admin.page.page_add',compact('keywords'));
    }

    public function edit(Page $page)
    {



        $keyworlist = array();

        foreach ($page->keywords as $keyw)
        {

            $keyworlist=array_add($keyworlist,count($keyworlist),$keyw->id);
        }
        $keywords=Keyword::all();
        return view('admin.page.page_edit',compact('page','keyworlist','keywords'));
    }

    public function slug(Request $request)
    {
        $validator=\Validator::make($request->all(),[
            'slug'=>'required|unique:pages'
        ]);
        if($validator->passes())
        {
            return 1;
        }else
            return 0;
    }

    public function update(Request $request,Page $page)
    {

        if($page->slug!=$request->slug)
        {
            $this->validate($request,[
                'name'=>'required',
                'title'=>'nullable|string',
                'slug'=>'required|unique:categories'

            ],['name.required'=>'وارد کردن نام برای صفحه الزامی است','slug.unique'=>'این نام باید یکتا باشد']);
            $cat=$page->update(['name'=>$request->name,'title'=>$request->title,'slug'=>$request->slug,'text'=>$request->text,'seo_desc'=>$request->seo_desc]);
        }else
        {
            $this->validate($request,[
                'name'=>'required',
                'title'=>'nullable|string',

            ],['name.required'=>'وارد کردن نام برای صفحه الزامی است','slug.unique'=>'این نام باید یکتا باشد']);

            $cat=$page->update(['name'=>$request->name,'title'=>$request->title,'text'=>$request->text,'seo_desc'=>$request->seo_desc]);

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

        $page->keywords()->sync($final_list);

        flashs('صفحه ویرایش شد','success');
        return redirect(route('admin.page.index'));

    }

    public function destroy(Request $request)
    {
        $page=new Page();
        $page->destroy($request->input('selected' ));
        flashs('صفحه  حذف شد','danger');
        return back();

    }

}
