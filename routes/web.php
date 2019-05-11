<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Mail\UserEmailNotification;
use Illuminate\Support\Facades\Mail;
Route::get('/',function (){
    return view('errors.404');
});
Route::any('captcha-test', function()
{
    if (Request::getMethod() == 'POST')
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        }
        else
        {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';
    $form .= '</form>';
    return $form;
});
Route::get('/get_captcha/{config?}', function (\Mews\Captcha\Captcha $captcha, $config = 'default') {
    return $captcha->src($config);
});
/********operators routes*************/
// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'AuthController@login'
]);
Route::post('check_login', [
    'as' => 'check_login',
    'uses' => 'AuthController@check_login'
]);
//route::post('chech_user')

/*Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);*/
/*Route::post('logout', [
    'as' => 'logout',
    'uses' => 'AuthController@logout'
]);*/
Route::get('logout', [
    'as' => 'logout',
    'uses' => 'AuthController@logout'
]);

/*Route::get('register', [
    'as' => 'register',
    'uses' => 'AuthController@register'
]);
Route::post('register', [
    'as' => 'check_register',
    'uses' => 'AuthController@check_register'
]);*/


// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => '',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...

/*
Route::group(['domain'=>'xbody'],function (){
    //site index route
    Route::get('/', function (){
        return view('index_page');
    })->name('home');
    Route::get('/home', 'HomeController@home')->name('home2');
    Route::get('/exchange', 'HomeController@exchange')->name('exchange');
  Route::get('/product/{product}','ProductController@show')->name('product.show');

});*/

//home routs
Route::get('/','HomeController@index')->name('home');
Route::get('page/{page}','PageController@show')->name('page');
//admin route group
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function()
{
    Route::get('/','AdminController@admin_panel')->name('admin');
    route::resource('admin','AdminController',['except'=>['destroy']]);
    Route::post('admin/socials',['as'=>'socials','uses'=>'HomeController@socials']);
    Route::post('admin/config',['as'=>'config','uses'=>'HomeController@config']);

    // Registration Routes...
    Route::get('/register',['as'=>'register','uses'=> 'AdminAuth\RegisterController@showRegistrationForm']);
    Route::post('/register',['as'=>'register','uses'=> 'AdminAuth\RegisterController@register']);
    //Login Routes...
    Route::get('/login',['as'=>'login','uses'=>'AdminAuth\LoginController@showLoginForm']);
    Route::post('/login',['as'=>'login','uses'=>'AdminAuth\LoginController@login']);
    Route::get('/logout',['as'=>'logout','uses'=>'AdminAuth\LoginController@logout']);


//admin.attribute.group routes
    Route::resource('attribute-group', 'AttributeGroupController', ['except' => ['destroy']]);
    Route::Delete('/attribute-group/destroy',['as'=>'attribute-group.destroy','uses'=>'AttributeGroupController@destroy']);
//admin.attribute routes
    Route::resource('attribute', 'AttributeController', ['except' => ['destroy']]);
    Route::Delete('/attribute/destroy',['as'=>'attribute.destroy','uses'=>'AttributeController@destroy']);

    Route::get('setting','AdminController@setting_index')->name('setting');
    Route::patch('setting','AdminController@setting')->name('setting.update');

//admin.product routes
    Route::resource('product', 'ProductController', ['except' => ['destroy']]);
    Route::Delete('/product/destroy',['as'=>'product.destroy','uses'=>'ProductController@destroy']);
    Route::post('/product/slug',['as'=>'product.slug','uses'=>'ProductController@slug']);
    Route::Post('/product/filter',['as'=>'product.filter','uses'=>'ProductController@filter']);
/*    Route::get('/product/reserves',['as'=>'product.reservess','uses'=>'ProductReserveController@indddex']);*/


        Route::get('/products/reserves',['as'=>'product.reservess','uses'=>'ProductReserveController@index']);
    Route::post('/products/reserves/filter',['as'=>'product.reserves.filter','uses'=>'ProductReserveController@filter']);
    Route::get('/products/reserves/filter',['as'=>'reserves.changes','uses'=>'ProductReserveController@filter']);
    Route::post('/products/reserves/change',['as'=>'reserves.change','uses'=>'ProductReserveController@change']);


    //admin.posts controller
    Route::resource('post', 'PostController', ['except' => ['destroy']]);
    Route::Delete('/post/destroy',['as'=>'post.destroy','uses'=>'PostController@destroy']);
    Route::Post('/post/get_post_type',['as'=>'post.get_post_type','uses'=>'PostController@get_post_type']);
    Route::Post('/post/filter',['as'=>'post.filter','uses'=>'PostController@filter']);
    Route::GET('/post/create_bay_cat/{category}',['as'=>'post.create_bay_cat','uses'=>'PostController@create_bay_cat']);
    Route::GET('/post/show_bay_cat/{category}',['as'=>'post.show_bay_cat','uses'=>'PostController@show_bay_cat']);
    Route::GET('/post/create_bay_product/{product}',['as'=>'post.create_bay_product','uses'=>'PostController@create_bay_product']);
    Route::GET('/post/show_bay_product/{product}',['as'=>'post.show_bay_product','uses'=>'PostController@show_bay_product']);
    Route::GET('/post/isaac',['as'=>'post.isaac','uses'=>'PostController@isaac']);

    //admin.slider routes
    Route::resource('slider', 'SliderController', ['except' => ['destroy']]);
    Route::Delete('/slider/destroy',['as'=>'slider.destroy','uses'=>'SliderController@destroy']);
    Route::Post('/slider/get_categories',['as'=>'slider.get_categories','uses'=>'CategoryController@get_categories']);
    //admin.page routes
    Route::resource('page', 'PageController', ['except' => ['destroy']]);
    Route::Delete('/page/destroy',['as'=>'page.destroy','uses'=>'PageController@destroy']);
    Route::post('/page/slug',['as'=>'page.slug','uses'=>'pageController@slug']);


    Route::resource('article_category', 'ArticleCategoryController', ['except' => ['destroy']]);
    Route::Delete('/article_category/destroy',['as'=>'article_category.destroy','uses'=>'ArticleCategoryController@destroy']);
    Route::post('/article_category/slug',['as'=>'article_category.slug','uses'=>'ArticleCategoryController@slug']);
    Route::resource('article', 'ArticleController', ['except' => ['destroy']]);
    Route::Delete('/article/destroy',['as'=>'article.destroy','uses'=>'ArticleController@destroy']);
    Route::post('/article/slug',['as'=>'article.slug','uses'=>'ArticleController@slug']);
    Route::Post('/article/filter',['as'=>'article.filter','uses'=>'articleController@filter']);

    //admin.category routes
    Route::resource('category', 'CategoryController', ['except' => ['destroy']]);
    Route::Delete('/category/destroy',['as'=>'category.destroy','uses'=>'CategoryController@destroy']);
    Route::post('/category/slug',['as'=>'category.slug','uses'=>'CategoryController@slug']);

    //admin.menu routes
    Route::group(['prefix' => 'menu', 'as' => 'menu.'], function()
    {
        Route::get('/',['as'=>'index','uses' =>'MenuController@index']);
        Route::get('/add',['as'=>'add.show','uses' => 'MenuController@addshowfrom']);
        Route::get('/edit/{menu}',['as'=>'edit.show','uses' => 'MenuController@editshowfrom']);
        Route::post('/add',['as'=>'add','uses' => 'MenuController@add']);
        Route::delete('/delete',['as'=>'delete','uses' => 'MenuController@delete']);
        Route::patch('/edit/{menu}',['as'=>'edit','uses' => 'MenuController@edit']);
    });

    Route::group(['prefix'=>'report','as'=>'report.'],function(){
        Route::get('users',['as'=>'users','uses'=>'ReportController@user']);
        Route::post('users',['as'=>'users','uses'=>'ReportController@user']);
        Route::get('branchusers/{id}',['as'=>'branchuser','uses'=>'ReportController@branchusers']);
        Route::post('branchusers/',['as'=>'branchusers','uses'=>'ReportController@branchuser']);
        Route::get('branchusers/excelExport/{id}',['as'=>'branchers.excelExport','uses'=>'ReportController@excelExport']);

        Route::get('reserves',['as'=>'reserves','uses'=>'ReportController@reserves']);
        Route::get('site-reserves',['as'=>'site-reserves','uses'=>'ReportController@allreserves']);
        Route::post('site-reserves',['as'=>'site-reservess','uses'=>'ReportController@allreserves']);

        Route::post('seenreserve',['as'=>'seenreserve','uses'=>'ReportController@seenreserve']);

    });

    //admin.ads
    Route::resource('ads', 'AdsController', ['except' => ['destroy']]);
    Route::Delete('/ads/destroy',['as'=>'ads.destroy','uses'=>'AdsController@destroy']);


    /*Branches routes*/
    Route::delete('branches/destroy',['as'=>'branches.destroy','uses'=>'BranchesController@destroy']);
    Route::resource('branches' , 'BranchesController' ,['except'=>['destroy']]);

    /*admin message Routes*/
    Route::get('message/delete/{id}' , 'MessageController@destroy')->name('message.delete');
    Route::post('message/changeStatus' , 'MessageController@changeStatus')->name('message.changeStatus');
    Route::resource('message' , 'MessageController' ,['except' => ['destroy']]);

    /*admin gallery routes*/
    Route::get('gallery/changeStatus/{gallery}' , 'GalleryController@changeStatus')->name('gallery.changeStatus');
    Route::post('/gallery/destroy' , 'GalleryController@destroy')->name('gallery.destroy');
    Route::post('/gallery/storeValidation' , 'GalleryController@store_validation')->name('gallery.store_validation');
    Route::get('gallery/deleteVideoFromGallery/{gallery}/{video}' , ['as'=>'gallery.delete_video_from_gallery' , 'uses' => 'GalleryController@deleteVideoFromGallery']);
    Route::post('gallery/videos/addVideoToGallery/{gallery}' , 'GalleryController@addVideo')->name('gallery.video.add_video');
    Route::get('gallery/editVideoFromGallery' , ['as'=>'gallery.edit_video_from_gallery' , 'uses'=>'GalleryController@editVideoFromGallery']);
    Route::get('gallery/deletePhotoFromGallery/{gallery}/{photo}' , ['as'=>'gallery.deletePhotoFromGallery' , 'uses'=>'GalleryController@deletePhotoFromGallery']);
    Route::post('gallery/photo/addPhotoToGallery/{gallery}' , 'GalleryController@addPhoto')->name('gallery.photo.add_photo');
    Route::post('gallery/photo/editPhotoFromGallery/{gallery}' , 'GalleryController@editPhoto')->name('gallery.photo.edit_photo');
    Route::resource('gallery' , 'GalleryController' , ['except' => ['destroy']]);

    /*admin interviewCategory routes*/
    Route::resource('interviewCategory' , 'InterviewCategoryController' , ['except' ,['destroy']]);

    /*admin interview routes*/
    Route::get('interview/changeStatus/{interview}' , ['uses'=>'InterviewController@changeStatus' , 'as'=>'interview.changeStatus']);
    Route::post('/interview/destroy' , 'InterviewController@destroy')->name('interview.destroy');
    Route::resource('interview' , 'InterviewController' , ['except' ,['destroy']]);

});
//product website side routes index

/**
 * Module Routes image manager
 */
Route::get('image-manager/view/{id}/thumb', [
    'as' => 'showthumb',
    'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@thumb'
]);

Route::get('image-manager/view/{id}/{width?}/{height?}/{canvas?}', [
    'as' => 'media',
    'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@full'
])->where('width', '[0-9]+')->where('height', '[0-9]+')->where('canvas', 'canvas');

Route::group(['middleware' => config('image-manager.middleware')], function() {

    Route::get('image-manager', [
        'as' => 'ImageManager',
        'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@index'
    ]);

    Route::post('upload-image', [
        'as' => 'ImageManagerUpload',
        'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@store'
    ]);

    Route::get('image-manager-images', [
        'as' => 'ImageManagerImages',
        'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@getImages'
    ]);

    Route::get('image-manager/delete/{id}', [
        'as' => 'ImageManagerDelete',
        'uses' => '\\Joselfonseca\\ImageManager\\Controllers\\ImageManagerController@delete'
    ]);
});

////////add comment controller
/*Route::resource('comment','CommentController',['except'=>'show','destroy']);*/


/*Route::group(['prefix' => 'company', 'as' => 'company.'], function() {
    Route::get('/', 'CompanyController@Company_panel')->name('Company');
    Route::get('/register', ['as' => 'register', 'uses' => 'CompanyAuth\RegisterController@showRegistrationForm']);
    Route::post('/register', ['as' => 'register', 'uses' => 'CompanyAuth\RegisterController@register']);
    Route::get('/login', ['as' => 'login', 'uses' => 'CompanyAuth\LoginController@showLoginForm']);
    Route::post('/login', ['as' => 'login', 'uses' => 'CompanyAuth\LoginController@login']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'CompanyAuth\LoginController@logout']);
});*/
/*route::get('test','AuthController@test')->name('test');*/

Route::group(['prefix'=>'user','middleware'=>'xAuth','as'=>'user.'],function(){
    Route::get('/',function(){
        return redirect(route('user.home'));
    });
    Route::get('panel',['as'=>'home','uses'=>'UserController@index']);
    Route::get('reserve',['as'=>'reserve','uses'=>'UserController@reserve']);
    Route::get('reserve/final',['as'=>'reserve.final','uses'=>'ReserveController@index']);
    Route::post('getreservedays',['as'=>'getreservedays','uses'=>'UserController@getreservedays']);

    Route::post('finalreserve',['as'=>'finalreserve','uses'=>'ReserveController@finalreserve']);
    Route::get('profile','UserController@profile')->name('profile');

    Route::get('reserves',['as'=>'reserves','uses'=>'ReserveController@PastReserve']);

    Route::get('productreserves',['as'=>'productreserve','uses'=>'ReserveController@productreserve']);

    Route::get('lastreserves',['as'=>'lastreserves','uses'=>'ReserveController@lastreserves']);

});
route::get('test','UserController@test');


Route::group(['prefix'=>'blog', 'as'=>'blog.'],function (){
    Route::get('/',['as'=>'index','uses'=>'ArticleController@index_page']);
    Route::get('/{category}/{slug}',['uses'=>'ArticleController@show','as'=>'post']);

});

Route::group(['prefix'=>'product', 'as'=>'product.'],function (){
    Route::get('/',['as'=>'index','uses'=>'ProductController@index_page']);
    Route::get('/{category}/{slug}',['uses'=>'ProductController@show_p','as'=>'product']);
    Route::post('/reserve',['uses'=>'ProductReserveController@store','as'=>'reserve']);
    Route::post('/reserve/user',['uses'=>'ProductReserveController@storeuser','as'=>'reserve.user']);

});

Route::post('getpackages','RequestController@branch')->name('getpackages');
Route::post('sendblogcat','ArticleController@posts')->name('sendblogcat');
// Media-Manager
Route::group(['prefix'=>'request','as'=>'request.'],function(){
    Route::get('/','RequestController@index')->name('page');
/*    Route::post('/',['uses'=>'RequestController@next','as'=>'add']);*/
    Route::get('/create',['uses'=>'RequestController@show','as'=>'store']);
    Route::post('getreservesdays',['as'=>'getreservesdays','uses'=>'UserController@getreservesdays']);
/*    Route::get('getreservesdays',['as'=>'getreservesdays','uses'=>'UserController@getreservesdays']);*/
    Route::post('finalreserves',['as'=>'finalreserves','uses'=>'ReserveController@finalreserves']);
    Route::post('reserves',['as'=>'reserves','uses'=>'ReserveController@finalreserves']);



});
ctf0\MediaManager\MediaRoutes::routes();
/*
Route::get('sendsms',function (){
    $number= '09904932093';
    $res=send_sms($number,'test');
    return $res;
});*/

/*message routes*/
Route::post('message/store' , 'MessageController@store')->name('message.store');


/*Interview routes*/
Route::get('/interview' , 'InterviewController@index_page')->name('gallery.index_page');
Route::get('/interview/showByCategory' , 'InterviewController@showByCategory')->name('interview.showByCategory');
Route::get('/interview/showByCategory/showAll' , 'InterviewController@showByCategory_showAll')->name('interview.showByCategory.showAll');

Route::get('/gallery/showByCategory/showAll' , 'GalleryController@showByCategory_showAll')->name('gallery.showByCategory.showAll');

/*Gallery routes*/
/*Route::get('/gallery/index' , 'GalleryController@index_page')->name('gallery.index_page');*/
Route::get('/gallery/showByCategory' , 'GalleryController@showByCategory')->name('gallery.showByCategory');
Route::get('gallery-images','GalleryController@index_photo')->name('gallery.index');
Route::get('gallery-videos','GalleryController@index_video')->name('gallery.video');
Route::post('gallery/getimages','GalleryController@getimages')->name('gallery.getimages');

/* contact us route, test, delete this later */
Route::get('contactus' ,'HomeController@contactus');

Route::get('jsondecode',function (){
  $json=GetTheUserReserve(1,4201);
   $json=json_decode($json);
    $json=json_decode($json);
dd($json);
});

Route::get('sendemail',function (){
   /* $e = FlattenException::create($exception);

    $handler = new SymfonyExceptionHandler();

    $html = $handler->getHtml($e);*/
 /*  try{
        $transport = new Swift_SmtpTransport('mail.uclearn.ir', '465', 'ssl');
        $transport->setUsername('info@uclearn.ir');
        $transport->setPassword('79380254Ali');
        $mailer = new Swift_Mailer($transport);
        $mailer->getTransport()->start();
        return 'ok';
    } catch (Swift_TransportException $e) {
        return $e->getMessage();
    } catch (Exception $e) {
        return $e->getMessage();
    }*/

 $res1= \Mail::to(['s.alisalmabadi@yahoo.com','alihasani7938@gmail.com'])->send(new UserEmailNotification);


   $res2 = \Mail::send('email.UserNotification', [], function($message)
    {
        $message->from('info@demo7.ir', 'Laravel');

        $message->to('s.alisalmabadi@yahoo.com')->cc('bar@example.com');

    });
// Laravel tells us exactly what email addresses failed, let's send back the first
    $fail = Mail::failures();
    if(!empty($fail)) throw new \Exception('Could not send message to '.$fail[0]);

   /* if(empty($res1) || empty($re2)) throw new \Exception('Email could not be sent.');*/

// Now do what you do
return view('email.UserNotification');
});

