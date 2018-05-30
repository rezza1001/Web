<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkDay;
use Carbon\Carbon;
use App\ErrorCode;
use App\ErrorDesc;
use App\MyResponse;
use Illuminate\Support\Facades\DB;

class WorkDayController extends Controller
{

    public function show()
    {
        $currentdate = Carbon::now('Asia/Jakarta')->toDateString();
         $worktime = WorkDay::all();
       return $worktime;
    }

    public function store(Request $request)
    {
       $currentdate = Carbon::now('Asia/Jakarta')->toDateString();
       DB::table('work_day')->truncate();
       $x = 0;
       for ($i=0; $i<count($request['day']); $i++){
             $workday = new WorkDay();
             $workday['day_of_week'] = $request['day'][$i]; 
             $workday['note']        = "Work Day";
             $workday->save();
             $x++;
       }
       $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK,  $x);
        return $response->get();
    }


}
