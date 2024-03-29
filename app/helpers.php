<?php
//global arrays


use Illuminate\Support\Arr;
use Illuminate\Support\Str;

function flashs($message,$level='info')
{

	session()->flash('flash_message',$message);
	session()->flash('flash_message_level',$level);

}
function flash_sms($message,$level='info')
{

	session()->flash('flash_sms',$message);
}
function flash_payment($message)
{
	session()->flash('flash_payment',$message);


}
function image_upload($image,$url="/images/")
{

	$photoName='/images/noimage.jpeg';
	if($image)
	{

		$photoName = time().'_'.$image->getClientOriginalname();

		$image->move(public_path($url), $photoName);
		$photoName=$url.$photoName;
	}

	return $photoName;
}
function get_post_type_name($id)
{
	$list=['','صفحه اصلی','دسته ها','محصولات','پشتیبانی'];


	return $list[$id];

}




function option_types()
{
	$collection =collect([

		['id'=>'1','name'=>'متن (تکست باکس)'],
		['id'=>'2','name'=>'انتخاب از چند (رایو باتن)'],


	]);
return $collection;

}

if (! function_exists('aggregate')) {
	/**
	 * Recursively sort an array by keys and values.
	 *
	 * @param  array  $array
	 * @return array
	 */
	function aggregate($array)
	{
		return Arr::aggregate(...$array);
	}
}
function get_payment_method()
{
	return [['id'=>2,'name'=>'زرین پال'],['id'=>3,'name'=>'بانک ملت'],];

}

function get_payment_method_name($id) {
	$array = get_payment_method();
	foreach ( $array as $child )
	{
		if($child['id']==$id)
			return $child['name'];
	}

}

function get_gender($number)
{
    if($number==1)
        return 'مذکر';
    elseif ($number==2)
        return 'مونث';
    elseif ($number==0)
        return 'انتخاب نشده';
    else
        'سایر';
}

function verifire_sms($user)
{
	$number=mt_rand(1000,9999);
	$message='';
	send_verify_sms('246','siavash65','siavash77',$user->mobile_number,'00985000125475',$message,$number);
	return $number;
}
function send_verify_sms($op,$password,$username,$to,$from,$message,$code)
{
	$too=array($to);
	$pattern_code = $op;
	$param=[];
	$input_data = array( "code" => $code,"app_name" => $message);
	$url = "http://37.130.202.188/patterns/pattern?username=".$username."&password=".urlencode($password)."&from=$from&to=".json_encode($too)."&input_data=".urlencode(json_encode($input_data))."&pattern_code=$pattern_code";
	$handler = curl_init($url);
	curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
	curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($handler);
	
	return $response;

}

function send_sms($number,$message)
{
	// turn off the WSDL cache
	$url = "37.130.202.188/services.jspd";

	$rcpt_nm = array($number);
	$param = array
	(
		'uname'=>'xbody',
		'pass'=>'9121446783',
		'from'=>'0098100020400',
		'message'=>$message,
		'to'=>json_encode($rcpt_nm),
		'op'=>'send'
	);

	$handler = curl_init($url);
	curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
	curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
	$response2 = curl_exec($handler);
	return $response2;

}

function provinces($mode,$id=0)
{
	$provinces= array(
		1=>"آذربایجان‌شرقی",
		2=>"آذربایجان‌غربی",
		3=>"اردبیل",
		4=>"اصفهان",
		5=>"البرز",
		6=>"ایلام",
		7=>"بوشهر",
		8=>"تهران",
		9=>"چهارمحال‌و‌بختیاری",
		10=>"خراسان‌جنوبی",
		11=>"خراسان‌رضوی",
		12=>"خراسان‌شمالی",
		13=>"خوزستان",
		14=>"زنجان",
		15=>"سمنان",
		16=>"سیستان‌و‌بلوچستان",
		17=>"فارس",
		18=>"قزوین",
		19=>"قم",
		20=>"كردستان",
		21=>"كرمان ",
		22=>"كرمانشاه",
		23=>"کهگیلویه‌و‌بویراحمد",
		24=>"گلستان",
		25=>"گیلان",
		26=>"لرستان",
		27=>"مازندران",
		28=>"مركزی",
		29=>"هرمزگان",
		30=>"همدان",
		31=>"یزد",
	);
	if($mode==0)
	{

	    return  $provinces;

	}else
	{
		return $provinces[$id];

	}
}

function cities($mode,$pid=1) {
	$cities = array(
		1 => array(
			1  => "اسکو",
			2  => "اهر",
			3  => "آذرشهر",
			4  => "بستان آباد",
			5  => "بناب",
			6  => "تبریز",
			7  => "جلفا",
			8  => "چاراویماق",
			9  => "خداآفرین",
			10 => "سراب",
			11 => "شبستر",
			12 => "عجب شیر",
			13 => "کلیبر",
			14 => "مراغه",
			15 => "مرند",
			16 => "ملکان",
			17 => "میانه",
			18 => "ورزقان",
			19 => "هریس",
			20 => "هشترود"
		),

		2 => array(
			1  => "ارومیه",
			2  => "اشنویه",
			3  => "بوكان",
			4  => "پلدشت",
			5  => "پیرانشهر",
			6  => "تكاب",
			7  => "چالدران",
			8  => "چایپاره",
			9  => "خوئ",
			10 => "سردشت",
			11 => "سلماس",
			12 => "شاهین دژ",
			13 => "شوط",
			14 => "ماكو",
			15 => "مهاباد",
			16 => "میاندوآب",
			17 => "نقده"
		),

		3 => array(
			1  => "اردبیل",
			2  => "بیله سوار",
			3  => "پارس آباد",
			4  => "خلخال",
			5  => "سرعین",
			6  => "كوثر",
			7  => "گرمی",
			8  => "مشگین شهر",
			9  => "نمین",
			10 => "نیر"
		),

		4 => array(
			1  => "اردستان",
			2  => "اصفهان",
			3  => "آران وبیدگل",
			4  => "برخوار",
			5  => "بو یین و میاندشت",
			6  => "تیران وکرون",
			7  => "چادگان",
			8  => "خمینی شهر",
			9  => "خوانسار",
			10 => "خور و بیابانک",
			11 => "دهاقان",
			12 => "سمیرم",
			13 => "شاهین شهرومیمه",
			14 => "شهرضا",
			15 => "فریدن",
			16 => "فریدونشهر",
			17 => "فلاورجان",
			18 => "کاشان",
			19 => "گلپایگان",
			20 => "لنجان",
			21 => "مبارکه",
			22 => "نایین",
			23 => "نجف آباد",
			24 => "نطنز"
		),

		5 => array(
			1 => "اشتهارد",
			2 => "ساوجبلاغ",
			3 => "طالقان",
			4 => "فردیس",
			5 => "کرج",
			6 => "نظرآباد"
		),

		6 => array(
			1  => "ایلام",
			2  => "ایوان",
			3  => "آبدانان",
			4  => "بدره",
			5  => "چرداول",
			6  => "دره شهر",
			7  => "دهلران",
			8  => "سیروان",
			9  => "ملكشاهی",
			10 => "مهران"
		),

		7 => array(
			1  => "بوشهر",
			2  => "تنگستان",
			3  => "جم",
			4  => "دشتستان",
			5  => "دشتی",
			6  => "دیر",
			7  => "دیلم",
			8  => "عسلویه",
			9  => "كنگان",
			10 => "گناوه"
		),

		8 => array(
			1  => "اسلامشهر",
			2  => "بهارستان",
			3  => "پاكدشت",
			4  => "پردیس",
			5  => "پیشوا",
			6  => "تهران",
			7  => "دماوند",
			8  => "رباطكریم",
			9  => "رئ",
			10 => "شمیرانات",
			11 => "شهریار",
			12 => "فیروزكوه",
			13 => "قدس",
			14 => "قرچک",
			15 => "ملارد",
			16 => "ورامین"
		),

		9 => array(
			1 => "اردل",
			2 => "بروجن",
			3 => "بن",
			4 => "سامان",
			5 => "شهركرد",
			6 => "فارسان",
			7 => "كوهرنگ",
			8 => "كیار",
			9 => "لردگان"
		),

		10 => array(
			1  => "بشرویه",
			2  => "بیرجند",
			3  => "خوسف",
			4  => "درمیان",
			5  => "زیرکوه",
			6  => "سرایان",
			7  => "سربیشه",
			8  => "طبس",
			9  => "فردوس",
			10 => "قائنات",
			11 => "نهبندان"
		),

		11 => array(
			1  => "باخرز",
			2  => "بجستان",
			3  => "بردسكن",
			4  => "بینالود",
			5  => "تایباد",
			6  => "تربت جام",
			7  => "تربت حیدریه",
			8  => "جغتای",
			9  => "جوین",
			10 => "چناران",
			11 => "خلیل آباد",
			12 => "خواف",
			13 => "خوشاب",
			14 => "داورزن",
			15 => "درگز",
			16 => "رشتخوار",
			17 => "زاوه",
			18 => "سبزوار",
			19 => "سرخس",
			20 => "فریمان",
			21 => "فیروزه",
			22 => "قوچان",
			23 => "كاشمر",
			24 => "كلات",
			25 => "گناباد",
			26 => "مشهد",
			27 => "مه ولات",
			28 => "نیشابور"
		),

		12 => array(
			1 => "اسفراین",
			2 => "بجنورد",
			3 => "جاجرم",
			4 => "راز و جرگلان",
			5 => "شیروان",
			6 => "فاروج",
			7 => "گرمه",
			8 => "مانه وسملقان"
		),

		13 => array(
			1  => "امیدیه",
			2  => "اندیکا",
			3  => "اندیمشک",
			4  => "اهواز",
			5  => "ایذه",
			6  => "آبادان",
			7  => "آغاجاری",
			8  => "باغ ملک",
			9  => "باوی",
			10 => "بندرماهشهر",
			11 => "بهبهان",
			12 => "حمیدیه",
			13 => "خرمشهر",
			14 => "دزفول",
			15 => "دشت آزادگان",
			16 => "رامشیر",
			17 => "رامهرمز",
			18 => "شادگان",
			19 => "شوش",
			20 => "شوشتر",
			21 => "کارون",
			22 => "گتوند",
			23 => "لالی",
			24 => "مسجدسلیمان",
			25 => "هفتگل",
			26 => "هندیجان",
			27 => "هویزه"
		),

		14 => array(
			1 => "ابهر",
			2 => "ایجرود",
			3 => "خدابنده",
			4 => "خرمدره",
			5 => "زنجان",
			6 => "سلطانیه",
			7 => "طارم",
			8 => "ماهنشان"
		),

		15 => array(
			1 => "آرادان",
			2 => "دامغان",
			3 => "سرخه",
			4 => "سمنان",
			5 => "شاهرود",
			6 => "گرمسار",
			7 => "مهدئ شهر",
			8 => "میامی"
		),

		16 => array(
			1  => "ایرانشهر",
			2  => "چاه بهار",
			3  => "خاش",
			4  => "دلگان",
			5  => "زابل",
			6  => "زاهدان",
			7  => "زهك",
			8  => "سراوان",
			9  => "سرباز",
			10 => "سیب و سوران",
			11 => "فنوج",
			12 => "قصرقند",
			13 => "كنارك",
			14 => "مهرستان",
			15 => "میرجاوه",
			16 => "نیك شهر",
			17 => "نیمروز",
			18 => "هامون",
			19 => "هیرمند"
		),

		17 => array(
			1  => "ارسنجان",
			2  => "استهبان",
			3  => "اقلید",
			4  => "آباده",
			5  => "بوانات",
			6  => "پاسارگاد",
			7  => "جهرم",
			8  => "خرامه",
			9  => "خرم بید",
			10 => "خنج",
			11 => "داراب",
			12 => "رستم",
			13 => "زرین دشت",
			14 => "سپیدان",
			15 => "سروستان",
			16 => "شیراز",
			17 => "فراشبند",
			18 => "فسا",
			19 => "فیروزآباد",
			20 => "قیروکارزین",
			21 => "کازرون",
			22 => "کوار",
			23 => "گراش",
			24 => "لارستان",
			25 => "لامرد",
			26 => "مرودشت",
			27 => "ممسنی",
			28 => "مهر",
			29 => "نی ریز"
		),

		18 => array(
			1 => "البرز",
			2 => "آبیك",
			3 => "آوج",
			4 => "بوئین زهرا",
			5 => "تاكستان",
			6 => "قزوین"
		),

		19 => array(
			1 => "قم"
		),

		20 => array(
			1 => "بانه",
			1 => "بیجار",
			1 => "دهگلان",
			1 => "دیواندره",
			1 => "سروآباد",
			1 => "سقز",
			1 => "سنندج",
			1 => "قروه",
			1 => "كامیاران",
			1 => "مریوان"
		),

		21 => array(
			1  => "ارزوئیه",
			2  => "انار",
			3  => "بافت",
			4  => "بردسیر",
			5  => "بم",
			6  => "جیرفت",
			7  => "رابر",
			8  => "راور",
			9  => "رفسنجان",
			10 => "رودبارجنوب",
			11 => "ریگان",
			12 => "زرند",
			13 => "سیرجان",
			14 => "شهربابك",
			15 => "عنبرآباد",
			16 => "فاریاب",
			17 => "فهرج",
			18 => "قلعه گنج",
			19 => "كرمان",
			20 => "كوهبنان",
			21 => "كهنوج",
			22 => "منوجان",
			23 => "نرماشیر"
		),

		22 => array(
			1  => "اسلام آبادغرب",
			2  => "پاوه",
			3  => "ثلاث باباجانی",
			4  => "جوانرود",
			5  => "دالاهو",
			6  => "روانسر",
			7  => "سرپل ذهاب",
			8  => "سنقر",
			9  => "صحنه",
			10 => "قصرشیرین",
			11 => "کرمانشاه",
			12 => "کنگاور",
			13 => "گیلانغرب",
			14 => "هرسین"
		),

		23 => array(
			1 => "باشت",
			2 => "بویراحمد",
			3 => "بهمئی",
			4 => "چرام",
			5 => "دنا",
			6 => "كهگیلویه",
			7 => "گچساران",
			8 => "لنده"
		),

		24 => array(
			1  => "آزادشهر",
			2  => "آق قلا",
			3  => "بندرگز",
			4  => "تركمن",
			5  => "رامیان",
			6  => "علی آباد",
			7  => "كردكوئ",
			8  => "كلاله",
			9  => "گالیكش",
			10 => "گرگان",
			11 => "گمیشان",
			12 => "گنبدكاووس",
			13 => "مراوه تپه",
			14 => "مینودشت"
		),

		25 => array(
			1  => "املش",
			2  => "آستارا",
			3  => "آستانه اشرفیه",
			4  => "بندرانزلی",
			5  => "رشت",
			6  => "رضوانشهر",
			7  => "رودبار",
			8  => "رودسر",
			9  => "سیاهكل",
			10 => "شفت",
			11 => "صومعه سرا",
			12 => "طوالش",
			13 => "فومن",
			14 => "لاهیجان",
			15 => "لنگرود",
			16 => "ماسال"
		),

		26 => array(
			1  => "ازنا",
			2  => "الیگودرز",
			3  => "بروجرد",
			4  => "پلدختر",
			5  => "خرم آباد",
			6  => "دلفان",
			7  => "دورود",
			8  => "دوره",
			9  => "رومشکان",
			10 => "سلسله",
			11 => "کوهدشت"
		),

		27 => array(
			1  => "آمل",
			2  => "بابل",
			3  => "بابلسر",
			4  => "بهشهر",
			5  => "تنكابن",
			6  => "جویبار",
			7  => "چالوس",
			8  => "رامسر",
			9  => "سارئ",
			10 => "سوادکوه شمالی",
			11 => "سوادكوه",
			12 => "سیمرغ",
			13 => "عباس آباد",
			14 => "فریدونكنار",
			15 => "قائم شهر",
			16 => "کلاردشت",
			17 => "گلوگاه",
			18 => "محمودآباد",
			19 => "میاندورود",
			20 => "نكا",
			21 => "نور",
			22 => "نوشهر"
		),

		28 => array(
			1  => "اراک",
			2  => "آشتیان",
			3  => "تفرش",
			4  => "خمین",
			5  => "خنداب",
			6  => "دلیجان",
			7  => "زرندیه",
			8  => "ساوه",
			9  => "شازند",
			10 => "فراهان",
			11 => "کمیجان",
			12 => "محلات"
		),

		29 => array(
			1  => "ابوموسی",
			2  => "بستك",
			3  => "بشاگرد",
			4  => "بندرعباس",
			5  => "بندرلنگه",
			6  => "پارسیان",
			7  => "جاسك",
			8  => "حاجی اباد",
			9  => "خمیر",
			10 => "رودان",
			11 => "سیریك",
			12 => "قشم",
			13 => "میناب"
		),

		30 => array(
			1 => "اسدآباد",
			2 => "بهار",
			3 => "تویسركان",
			4 => "رزن",
			5 => "فامنین",
			6 => "كبودرآهنگ",
			7 => "ملایر",
			8 => "نهاوند",
			9 => "همدان"
		),

		31 => array(
			1 => "ابركوه",
			2 => "اردكان",
			3 => "اشکذر",
			4 => "بافق",
			5 => "بهاباد",
			6 => "تفت",
			7 => "خاتم",
			8 => "مهریز",
			9 => "میبد"
		)
	);

	if ( $mode == 0 )
	{
		return $cities[$pid];
	}else if($mode == 1)
	{
		return $cities;
	}
}

//city_filter_types
function city_filter_types()
{
	return [

		['id'=>0,'name'=>'انتخاب'],
		['id'=>1,'name'=>'همه شهر ها'],
		['id'=>2,'name'=>'همه شهر ها به غیر از'],
		['id'=>3,'name'=>'فقط شهرهای'],

		];

}

 function getbranches()
{
    $token='c6ef92be07fbd8091aaff53e455f6a24b1bae4d4';
    $api_url=env('WEBSERIVE_URL','http://192.168.1.35:8182/').'Branches/GetAllBranches';
    try {
        $response = file_get_contents($api_url . '?token=' . $token);
        return $response;
    }catch (Exception $e) {
       // echo $e->getMessage();
        report($e);
        Log::error($e);
        return false;
    }
}

function branchusers($branch_id){
    $token='c6ef92be07fbd8091aaff53e455f6a24b1bae4d4';
    $api_url = env('WEBSERIVE_URL', 'http://192.168.1.35:8182/') . 'Users/GetAllUsers/';
    try {
        $response = file_get_contents($api_url . $branch_id . '?token=' . $token);
        return $response;
    }catch (Exception $e){
        report($e);
        Log::error($e);
        return view('errors.database');
    }
}

function getuser($id,$username,$password){
    $token='c6ef92be07fbd8091aaff53e455f6a24b1bae4d4';
    $api_url=env('WEBSERIVE_URL','http://192.168.1.35:8182/').'Users/GetUserInfo';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$api_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,"token=$token&username=$username&id=$id&PResult=$password");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
// receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_close ($ch);
    $result = curl_exec ($ch);
    return $result;
// further processing ....

}

function users(){
    $res = branchusers(1);
    //dd($res);
    $res = json_decode($res, true);
    $res = json_decode($res, true);
    foreach ($res as $us){
        echo $us['Mobile'].'&nbsp; <b>'.$us['PResult'].'</b><br>';
    }
}


function getpackages($branch_id){
    $token='c6ef92be07fbd8091aaff53e455f6a24b1bae4d4';
    $api_url=env('WEBSERIVE_URL','http://192.168.1.35:8182/').'Packages/GetBranchPackages/';
   try{
    $response=file_get_contents($api_url.$branch_id.'?token='.$token);
    return $response;
   }catch (Exception $e){
       report($e);
       Log::error($e);
       return view('errors.database');
   }
}

function GetTheUserReserve($branch_id,$user_id){
    $token='c6ef92be07fbd8091aaff53e455f6a24b1bae4d4';
    $api_url=env('WEBSERIVE_URL','http://192.168.1.35:8182/').'Users/GetTheUserReserve';
    try{
        $response=file_get_contents($api_url.'?id='.$branch_id.'&userID='.$user_id.'&token='.$token);
        return $response;
    }catch (Exception $e){
        report($e);
        Log::error($e);
        return view('errors.database');
    }
}

function Convertnumber2english($srting) {
    $srting = str_replace('0','۰', $srting);
    $srting = str_replace('1','۱', $srting);
    $srting = str_replace('2','۲', $srting);
    $srting = str_replace('3','۳', $srting);
    $srting = str_replace('4','۴', $srting);
    $srting = str_replace('5','۵', $srting);
    $srting = str_replace('6','۶', $srting);
    $srting = str_replace('7','۷', $srting);
    $srting = str_replace('8','۸', $srting);
    $srting = str_replace('9','۹', $srting);
    return $srting;
}
function Convertnumber($srting) {
    $srting = str_replace('۰','0', $srting);
    $srting = str_replace('۱','1', $srting);
    $srting = str_replace('۲','2', $srting);
    $srting = str_replace('۳','3', $srting);
    $srting = str_replace('۴','4', $srting);
    $srting = str_replace('۵','5', $srting);
    $srting = str_replace('۶','6', $srting);
    $srting = str_replace('۷','7', $srting);
    $srting = str_replace('۸','8', $srting);
    $srting = str_replace('۹','9', $srting);
    return $srting;
}

function senddataresreve($json){
    //dd($json);
    $api_url= env('WEBSERIVE_URL','http://192.168.1.35:8182/');
    $api_url=$api_url.'Reservation/GetReservationInfo';
    try{
    $curl=curl_init($api_url);
    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS,"params=".$json);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //Tell cURL that it should only spend 10 seconds
//trying to connect to the URL in question.
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);

//A given cURL operation should only take
//30 seconds max.
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    $result=curl_exec($curl);
    if ($result === false) {
        throw new Exception(curl_error($curl), curl_errno($curl));
    }

    /* Process $content here */

    // Close curl handle
    curl_close($curl);
} catch(Exception $e) {

    trigger_error(sprintf(
        'Curl failed with error #%d: %s',
        $e->getCode(), $e->getMessage()),
        E_USER_ERROR);

}


    return $result;

    }

    function getdateorg($date){
        $res=str_replace('T00:00:00','',$date);
        $res=explode('-',$res);
        return $res;
    }

function SetReservationInfo($json){
    $api_url= env('WEBSERIVE_URL','http://192.168.1.35:8182/');
    $api_url=$api_url.'Reservation/SetReservationInfo';
    $curl=curl_init($api_url);
    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS,"params=".$json);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result=curl_exec($curl);
    return $result;

}

function shamsi($data){
    $date=getdateorg($data);
    $dates=\Hekmatinasser\Verta\Facades\Verta::getJalali($date[0],$date[1],$date[2]);
    $year=Convertnumber2english($dates[0]);
    $month=Convertnumber2english($dates[1]);
    $day=Convertnumber2english($dates[2]);
    $res=$year.'/'.$month.'/'.$day;
    $res=Convertnumber2english($res);
    return $res;
}

function branchName($id){
    $branch=\App\Branch::where('orginal_id',$id)->first();
    return $branch->name;
}

function PersianDay($id){
    switch ($id) {
        case 1:
            return 'شنبه';
            break;
        case 2:
            return 'یکشنبه';
            break;
        case 3:
            return 'دوشنبه';
            break;
        case 4:
            return 'سه شنبه';
            break;
        case 5:
            return 'چهارشنبه';
            break;
        case 6:
            return 'پنجشنبه';
            break;
        case 7:
            return 'جمعه';
            break;

    }
}