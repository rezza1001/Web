<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ErrorCode;
use App\ErrorDesc;
use App\MyResponse;
use App\WorkTime;
use App\User;
use App\Employees;
use App\Absent;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getToday()
    {
       $currentdate = Carbon::now('Asia/Jakarta')->toDateString();
        $absent      = DB::table('absent_header')
                    ->join('work_time', 'absent_header.work_time', '=', 'work_time.id')
                    ->join('work_status', 'absent_header.status', '=', 'work_status.id')
                    ->select('absent_header.*', 'work_time.work_start',  
                            'work_time.work_end','work_time.max_late', 
                            'work_status.name as status')
                    ->whereDate('absent_header.work_date', '=',$currentdate)
                    ->get();   

        $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $absent   );
        return $response->get();     
    }

    public function getEmployees(){
        $data       = DB::select("call absent_today()");
        $response    = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $data   );
        return $response->get();     
    }

    function getAbsentStatus(){
        $absent   = DB::table('absent_status')->whereIn('id',[1,2,6,7])->get();
        $response    = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $absent   );
        return $response->get();   
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
