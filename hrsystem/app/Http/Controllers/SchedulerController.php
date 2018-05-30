<?php

namespace App\Http\Controllers;

use App\Absent;
use App\AbsentDetail;
use Carbon\Carbon;
use App\WorkDay;
use App\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchedulerController extends Controller
{
    public function createAbsent()
    {
    	$absent = New Absent;
    	$currentdate = Carbon::now('Asia/Jakarta');

    	$workday 	= WorkDay::where('day_of_week','=',$currentdate->dayOfWeek )->first();
    	$wokTime 	= WorkTime::where('exp_at','>',$currentdate->toDateString())->first();

    	$absent['work_date'] = $currentdate->toDateString();
    	$absent['work_day'] = $currentdate->day;
    	$absent['work_month'] = $currentdate->month;
    	$absent['work_year'] = $currentdate->year;
    	$absent['work_time'] = $wokTime['id'];
    	$absent['note'] = "Testing Absensi";

    	if ($workday == null){
			$absent['status'] = "2";
    	}
    	else {
			$absent['status'] = "1";
    	}
    	$absent->save();
    }

    public function closeAbsent(){
       $currentdate = Carbon::now('Asia/Jakarta')->toDateString();$currentdate = Carbon::now('Asia/Jakarta')->toDateString();
       // $currentdate ="2018-03-26";
       $absent_header = Absent::where('work_date','=',$currentdate) ->first();
       
 	   $employees = DB::select("call absent_employee_today('".$currentdate."')");
 	   $x = 0;
 	   for ($i=0; $i < count($employees); $i++) { 
 	   		$emp = json_decode(json_encode($employees), true)[$i];
 	   		if ($emp['absent_header'] == null ){
				$absent        			= new AbsentDetail();
	            $absent['status']   	= 5;
	            $absent['employee']     = $emp['id'];
	            $absent['check_in']     = null;
	            $absent['check_out']     = null;
	            $absent['note']         = "Tanpa Keterangan|Tanpa Keterangan";
	            $absent['absent_header']= $absent_header['id'];
	            $absent->save();
 	   		}
 	   }
    }

     public function colbackPayment(Request  $request){
		DB::table('callback')->insert( ['data' => $request]);
     
     }
}
