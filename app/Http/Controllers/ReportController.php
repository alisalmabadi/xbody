<?php

namespace App\Http\Controllers;
use App\Branch;
use App\Reserve;
use Illuminate\Support\Carbon;
use App\User;
use Illuminate\Http\Request;

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
        if(is_null($users)){
            return view('errors.database');
        }else {
            return view('admin.report.report_users', compact('users', 'branches'));
        }
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
