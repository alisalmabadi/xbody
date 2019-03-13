<?php

namespace App\Http\Controllers;
use App\Branch;
use App\Reserve;
use Closure;
use Illuminate\Support\Carbon;
use App\User;
use Illuminate\Http\Request;

use App\Exports\UserBranchesExport;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function user(Request $request)
    {
        $filter=array();
        $filter['search']=$request->search? $request->search:'';

        $filter['date_from']=$request->date_from ? Carbon::createFromTimestamp($request->date_from/1000):Carbon::create('2012','1','1');
        $filter['date_to']=$request->date_to ?     Carbon::createFromTimestamp($request->date_to/1000):Carbon::now();

            $filterr=[['first_name','LIKE','%'.$filter['search'].'%']];


        $users=User::where($filterr)->whereBetween('created_at',array($filter['date_from'],$filter['date_to']))->get();

        /*$users->load('reserves');*/
        /*$users->load('reserves.days');
        $users->load('reserves.detail');*/

        return view('admin.report.report_user',compact('users','filter'));
    }

    public function branchusers($id)
    {
        $branches=Branch::all();
        $users=branchusers($id);
        $users = json_decode($users);
        $users = json_decode($users);
        $branchers_id = $id;
        if(is_null($users)){
            return view('errors.database');
        }else {
            return view('admin.report.report_users', compact('users', 'branches' , 'branchers_id'));
        }
    }

    public function excelExport($id)
    {
        $data=branchusers($id);
        $data = json_decode($data);
        $data = json_decode($data);
        /*$users=branchusers($id);
        $users=json_decode($users);
        $users=json_decode($users);*/
//        return Excel::download(new UsersExport, 'users.xlsx');

        $response = new Response();

        //$response = $closure($request);
   /*     $response->headers->set('Access-Control-Allow-Origin' , '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');*/

       return Excel::download(new UserBranchesExport($data), 'users.xlsx');
        /*return response($response)->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');*/
     /*   $response->sendHeaders(array(
            'Content-Type: application/vnd.ms-excel',
            'Content-Disposition: attachment; filename="users.xlsx"',
            'Access-Control-Allow-Origin' , '*',

        ));*/

//        dd($a);
//        return redirect()->back();
    }


    public function branchuser(Request $request)
    {
        return redirect(route('admin.report.branchuser',$request->id));
    }

    public function reserves()
    {
        $reserves=Reserve::where('user_id','!=',null)->get();
        $reserves->load('user.branch');
        return view('admin.report.report_reserves',compact('reserves'));
    }

    public function allreserves(Request $request)
    {
/*        dd($request->all());*/
        if($request->all()!=null) {
            $id = $request->id;
            if($id==0){
                $id=[1,2,3,4,5];
            }else{
                $id=[$request->id];
            }
        }else{
            $id=[1,2,3,4,5];
        }

/*       dd($id);*/

        $reserves=Reserve::whereIn('branch_id',$id)->where('user_id','=',null)->get();
        $reserves->load('branch');
/*        dd($reserves);*/
        return view('admin.report.report_all_reserves',compact('reserves'));
    }

    public function seenreserve(Request $request)
    {
        $reserve=Reserve::where('id',$request->id)->first();
        $reserve->stage=1;
        $reserve->save();
/*        $reserve->update(['stage',1]);*/
        return $reserve;
    }
}
