<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\GalleryPhoto;
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
            $titles = $request['gallery_photos_title'];
            $alts = $request['gallery_photos_alt'];
            $photos = $request['gallery_photos_image_original'];

            /*tarkibe hame array ha tooye yeki*/
            $all_inputs = array();
            $index = 0;
            foreach($titles as $item)
            {
                $all_inputs[] = ['index'=>$index , 'title'=>$titles[$index] , 'alt'=>$alts[$index] , 'photo'=>$photos[$index]];
                $index += 1;
            }

            /*photos upload*/
            foreach ($all_inputs as $input)
            {
                $photo_name = $gallery['slug'].'_photo_'.sha1($input['photo']->getClientOriginalName()).'.'.$input['photo']->getClientOriginalExtension();
                $photo_url = 'Gallery/' . $gallery['slug'] . '/' . 'Photos';
                $photo_type = $input['photo']->getClientOriginalExtension();
                $input['photo']->move($photo_url , $photo_name);

                $galleryPhoto = new GalleryPhoto();
                $galleryPhoto->create([
                    'gallery_id' => $gallery->id,
                    'title' => $input['title'],
                    'image_path' => $photo_url . '/'.$photo_name,
                    'image_type' => $photo_type,
                    'alt' => $input['alt'],
                    'image_thumbnail' => 'later :|',
                    'status' => '1'
                ]);
            }
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

    public function addVideo(Request $request , Gallery $gallery)
    {
        /*upload e video*/
        $video = $request['gallery_videos_video_original'];
        $video_name = $gallery->slug.'_video_'.sha1($video->getClientOriginalName()).'.'.$video->getClientOriginalExtension();
        $video_url = 'Gallery/' . $gallery->slug . '/' . 'Videos';
        $video_type = $video->getClientOriginalExtension();
        $video->move($video_url , $video_name);

        $new_video = new GalleryVideos();
        $new_video = $new_video->create([
            'gallery_id' => $gallery->id,
            'title' => $request['gallery_videos_title'],
            'video_path' => $video_url. '/' . $video_name,
            'video_type' => $video_type,
            'video_thumbnail' => ':|',
            'status' => '1'
        ]);

        return redirect()->route('admin.gallery.edit' , $gallery);
    }


    public function deletePhotoFromGallery(Gallery $gallery , GalleryPhoto $photo)
    {
        GalleryPhoto::destroy($photo->id);
        return response('photo deleted');
    }

    public function addPhoto(Request $request , Gallery $gallery)
    {
        /*upload e image*/
        $photo = $request['gallery_photo_image_original'];
        $photo_name = $gallery->slug . '_photo_' . sha1($photo->getClientOriginalName()).'.'.$photo->getClientOriginalExtension();
        $photo_type = $photo->getClientOriginalExtension();
        $photo_url = 'Gallery/' . $gallery->slug . 'Photos';

        $photo->move($photo_url , $photo_name);

        $image = new GalleryPhoto();
        $image->create([
           'gallery_id' => $gallery->id,
           'title' => $request['gallery_photo_title'],
            'alt' => $request['gallery_photo_alt'],
            'image_path' => $photo_url . '/' . $photo_name,
            'image_type' => $photo_type,
            'image_thumbnail' => 'later :|',
            'status' => '1'
        ]);

        return redirect()->route('admin.gallery.edit' , $gallery);
    }


    public function index_page()
    {
        dd('asd');
        return view('galleries.gallery_photo');
    }


    public function index_photo()
    {
       /* $galleries=Gallery::where('status',1)->with(['photos'=>function($query){
            $query->where('status',1);
        }])->get();*/

        $galleries=Gallery::whereHas('photos')->where('status',1)->get();

      //  dd($galleries);
        return view('galleries.gallery_photo',compact('galleries'));
    }

    public function getimages(Request $request)
    {
      /*  $gallery_images=Gallery::where([['status',1],['id',$request->id]])->with*/
      $galleryphotos=GalleryPhoto::where([['status',1],['gallery_id',$request->id]])->get();
      return response()->json($galleryphotos,200);
    }
}
