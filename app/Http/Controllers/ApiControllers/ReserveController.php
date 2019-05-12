<?php

namespace App\Http\Controllers\ApiControllers;

use App\Branch;
use App\Http\Resources\ReserveCollection;
use App\Http\Resources\ReserveDetailResource;
use App\Http\Resources\ReserveResource;
use App\Reserve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReserveController extends Controller
{
    public function index($token = "",$BranchID)
    {
        $BranchID=(int)$BranchID;
        if($token==env('API_TOKEN')) {
            $reserves = Reserve::where([['branch_id', $BranchID],['seen',0]])->get();
            if(count($reserves)==0){
                return response()->json(['error'=>'This branch has not reserves']);
            }else{
                return ReserveResource::collection($reserves);
            }
            /*        dd($reserves);*/
        }else{
            return response()->json(['error'=>'Wrong Api Token!'],403);
        }
    }

    public function show($token = "",$ReserveID)
    {
        $ReserveID=(int)$ReserveID;
      if($token==env('API_TOKEN')) {
          $reserve = Reserve::where('id', $ReserveID)->first();
          $res=$reserve->update(['seen'=>1]);
          if(!empty($reserve)) {
              return new ReserveDetailResource($reserve);
          }else{
              return response()->json(['error'=>'No Reserve Matches With This Id'],403);
          }
      }else{
          return response()->json(['error'=>'Wrong Api Token!'],403);
      }
    }
}
