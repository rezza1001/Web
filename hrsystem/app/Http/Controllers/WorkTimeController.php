<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkTime;
use Carbon\Carbon;
use App\ErrorCode;
use App\ErrorDesc;
use App\MyResponse;

class WorkTimeController extends Controller
{


    public function show()
    {
        $currentdate = Carbon::now('Asia/Jakarta')->toDateString();
        $worktime = WorkTime::where('exp_at','>',$currentdate)->first();
        return $worktime;
    }

   
    public function update(Request $request)
    {
        $currentdate = Carbon::now('Asia/Jakarta')->toDateString();
        $worktime = WorkTime::where('exp_at','>',$currentdate)->first();
         $request['max_late'] = '0';
         $request['exp_at'] = '9999-12-30 00:00:00';
         $request['note'] = '';
         $worktime->update($request->all());
        $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $worktime );
        return $response->get();
    }


}
