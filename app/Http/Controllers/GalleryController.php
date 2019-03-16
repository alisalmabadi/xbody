<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\GalleryVideos;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index' , compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*For ajax validation before store the gallery*/
    public function store_validation(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|max:255',
            'slug' => 'required|string|unique:galleries|max:255|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'status' => 'required|numeric',
            'hidden_image_original' => 'required',
            'type' => 'required|numeric'
        ],[
            'name.required' => 'لطفا نام گالری را وارد کنید',
            'name.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'slug.required' => 'لطفا نام انگلیسی گالری را وارد کنید',
            'slug.string' => 'لطفا فقط کاراکتر وارد کنید',
            'slug.unique' => 'این نام قبلا انتخاب شده است',
            'slug.max' => 'تعداد کاراکتر وارد شده بیش از حد مجاز است',
            'slug.regex' => 'لطفا فقط حرف انگلیسی وارد کنید, بدون فاصله',
            'status.required' => 'لطفا وضعیت را مشخص کنید',
            'status.numeric' => 'مشکلی رخ داده است, لطفا مجدد وضعیت را مشخص کنید',
            'type.required' => 'لطفا نوع گالری را مشخص کنید',
            'type.numeric' => 'مشکلی رخ داده است, لطفا مجدد نوع گالری را مشخص کنید',
            'hidden_image_original.required' => 'لطفا عکس گالری را مشخص کنید'
        ]);
    }
    public function store(Request $request)
    {
        /*upload gallery_header image*/
        $file_name = $request['slug'].'_header'.'.'.$request['image_original']->getClientOriginalExtension();
        $file_url = 'Gallery/'.$request['slug'];
        $image_type = $request['image_original']->getClientOriginalExtension();
        $request['image_original']->move($file_url , $file_name);

        $gallery = new Gallery();
        $gallery = $gallery->create([
           'name' => $request['name'],
           'slug' => $request['slug'],
            'image_original' => $file_url . '/' . $file_name,
            'image_type' => $image_type,
            'image_thumbnail' => 'later :|',
            'status' => $request['status'],
            'type' => $request['type']
        ]);

        /*gallery photos*/
        if($gallery['type'] == '0')
        {

        }/*gallery videos*/
        elseif ($gallery['type'] == '1')
        {
            $titles = $request['gallery_video_title'];
            $videos = $request['gallery_video_video_original'];
            foreach (array_combine($titles,$videos) as $title=>$video)
            {
                /*Upload*/
                $video_name = $gallery['slug'].'_video_'.sha1($video->getClientOriginalName()).'.'.$video->getClientOriginalExtension();
                $video_url = 'Gallery/' . $gallery['slug'] . '/' . 'Videos';
                $video_type = $video->getClientOriginalExtension();
                $video->move($video_url , $video_name);

                /*save to database*/
                $g_v = new GalleryVideos();
                $g_v->create([
                    'gallery_id' => $gallery->id,
                    'title' => $title,
                    'video_path' => $video_url .'/'. $video_name,
                    'video_type' => $video_type,
                    'video_thumbnail' => ':|',
                    'status' => '1',
                ]);
            }
        }

        flash('گالری با موفقیت ذخیره گردید');
        return redirect()->route('admin.gallery.index');
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
    public function edit(Gallery $gallery)
    {
        $gallery->load('videos');
        $gallery->load('photos');

        return view('admin.gallery.edit' , compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $gallery->update([
            'status' => $request['status'],
            'name' => $request['name']
        ]);
        return redirect()->route('admin.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $gallery = new Gallery();
        $gallery->destroy($request->input('selected' ));
        flash('گالری حدف شد','danger');
        return back();
    }

    public function changeStatus(Gallery $gallery)
    {
        if($gallery->status == 0){
            $gallery->update(['status' => '1']);
        }
        else{
            $gallery->update(['status' => '0']);
        }
        return redirect()->route('admin.gallery.index');
    }

    public function deleteVideoFromGallery(Gallery $gallery , GalleryVideos $video)
    {
        GalleryVideos::destroy($video->id);
//        return redirect()->route('admin.gallery.edit',$gallery);
        return response('deleted');
    }
}
