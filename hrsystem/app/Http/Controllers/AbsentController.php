<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Absent;
use App\AbsentDetail;
use App\WorkTime;
use App\ErrorCode;
use App\ErrorDesc;
use App\MyResponse;
use Carbon\Carbon;
use App\Http\Controllers\ValidUser;
use App\Http\Controllers\AbsentDetailController;

class AbsentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
Berikut list UI/UX kiostix V.3 (Note : masih menggunakan data lokal/dummy)
1. Page Onboarding (Selesai)
2. Page Login (Selesai)  
3. Page Register (Selesai) 
4. Page Home
    4.1 Menu Beranda
        4.1.1 Page All event (Selesai)
        4.1.2 Page See All (Selesai)
        4.1.3 Page Serach (Dalam pengerjaan)
    4.2 Menu Events (Selesai)
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getToday(Request $request)
    {
        $checkUser = new ValidUser($request);
        if ($checkUser != ErrorCode::$OK){
            $response   = new MyResponse(ErrorCode::$INVALID_TOKEN, ErrorDesc::$INVALID_TOKEN, "-");
            return $response->get();
        }
       
        $currentdate = Carbon::now('Asia/Jakarta')->toDateString();
        $absent      = DB::table('absent_header')
                    ->join('work_time', 'absent_header.work_time', '=', 'work_time.id')
                    ->join('work_status', 'absent_header.status', '=', 'work_status.id')
                    ->select('absent_header.*', 'work_time.work_start',  
                            'work_time.work_end','work_time.max_late', 
                            'work_status.name as status')
                    ->whereDate('absent_header.work_date', '=',$currentdate)
                    ->get();

        if ($absent->count() == 0){
            $response   = new MyResponse(ErrorCode::$EMPTY_DATA, ErrorDesc::$EMPTY_DATA,$absent->count());
            return $response->get();
        }

        $absent_data = json_decode(json_encode($absent[0]), true);
        $absent_dtl  = AbsentDetail::where('employee','=',$request['employee_id'])
                       ->where('absent_header','=',$absent_data['id'])->first();
        if (empty($absent_dtl)){
            $absent_data['check_in'] = null;
            $absent_data['check_out'] = null;
        }
        else {
            $absent_data['check_in'] = $absent_dtl ['check_in'];
            $absent_data['check_out'] = $absent_dtl ['check_out'];
            $absent_data['note'] = $absent_dtl ['note'];
        }
        $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $absent_data );
        return $response->get();
    }


    public function getHistory(Request $request)
    {
        $checkUser = new ValidUser($request);
        if ($checkUser != ErrorCode::$OK){
            $response   = new MyResponse(ErrorCode::$INVALID_TOKEN, ErrorDesc::$INVALID_TOKEN, "-");
            return $response->get();
        }
        $dtl        = DB::table('absent_detail')
                            ->select(DB::raw('absent_header'))
                            ->where('employee','=',$request['employee_id'])->get();

        if ($dtl->count() == 0){
            $response   = new MyResponse(ErrorCode::$EMPTY_DATA, ErrorDesc::$EMPTY_DATA, "empty" );
            return $response->get();
        }
        $headers ;
        for ($i=0; $i<$dtl->count(); $i++ ){
            $headers[$i] = json_decode(json_encode($dtl[$i]), true)['absent_header'];
        }
        

        $currentdate = Carbon::now('Asia/Jakarta')->toDateString();
        $absent      = DB::table('absent_header')
                    ->join('work_time', 'absent_header.work_time', '=', 'work_time.id')
                    ->join('work_status', 'absent_header.status', '=', 'work_status.id')
                    ->select('absent_header.*', 'work_time.work_start',  
                            'work_time.work_end','work_time.max_late', 
                            'work_status.name as status')
                    ->whereIn('absent_header.id',$headers)
                    ->orderBy('absent_header.work_date', 'desc')
                    ->limit(10)
                    ->get();


        $absent_dtl  = AbsentDetail::where('employee','=',$request['employee_id'])->get();
        $object_dtl;
        $obj_response;
        for ($i=0; $i<$absent_dtl->count(); $i++ ){
            $object_dtl[$absent_dtl[$i]['absent_header']] = $absent_dtl[$i];
        }

        for ($i=0; $i<$absent->count(); $i++ ){
            $absent_data = json_decode(json_encode($absent[$i]), true);
            if (empty($object_dtl[$absent_data['id']])){
                $absent_data['check_in'] = null;
                $absent_data['check_out'] = null;
            }
            else {
                $absent_data['check_in'] = $object_dtl[$absent_data['id']]['check_in'];
                $absent_data['check_out'] = $object_dtl[$absent_data['id']]['check_out'];
                $absent_data['note'] = $object_dtl[$absent_data['id']]['note'];
            }
            $obj_response[$i] = $absent_data;

        }
        
        $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $obj_response );
        return $response->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkIn(Request $request)
    {
        $response;
        $checkUser = new ValidUser($request);
        if ($checkUser != ErrorCode::$OK){
            $response   = new MyResponse(ErrorCode::$INVALID_TOKEN, ErrorDesc::$INVALID_TOKEN, "-");
            return $response->get();
        }
        else {
            $absent_header = Absent::where('id','=',$request['absent_header'])
                             ->first();
            $work_time     = WorkTime::where('id','=',$absent_header['work_time'])
                             ->first();
            $absent_time   = Carbon::createFromFormat('Y-m-d H:i:s', 
                             $absent_header['work_date']
                             .' '.$work_time['work_start']
                             ,'Asia/Jakarta'); 
            $lateTime      = $absent_time->addMinutes($work_time['max_late']);
            
            $checkin       = Carbon::now('Asia/Jakarta');
            $diff          = $lateTime->diffInMinutes($checkin,false);

            $absent        = new AbsentDetail();
            if ($diff > 0){
                $absent['status']   = 6;
            }
            else {
                $absent['status']   = 1;
            }
            $absent['employee']     = $request['employee_id'];
            $absent['check_in']     = $checkin;
            $absent['note']         = $request['note'];
            $absent['absent_header']= $absent_header['id'];
            $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $absent);
            try {
                 $absent->save();
            } catch(\Illuminate\Database\QueryException $e){
                $errorCode      = $e->errorInfo[1];
                if($errorCode   == ErrorCode::$DUPLICATE_ENTRY){
                   $response    = new MyResponse(ErrorCode::$DUPLICATE_ENTRY, ErrorDesc::$DUPLICATE_ENTRY, "Anda sudah melakukan absensi");
                }
            }
           
            return $response->get();
        }
        // return $response->get();
    }

    public function manualAbsent(Request $request){
        if ($request['type'] == 1){
            return $this->manualCheckIn($request);
        }
        else {
            return $this->manualCheckOut($request);
        }

    }

    public function manualCheckIn(Request $request)
    {
        $response;
        $absent_header = Absent::where('id','=',$request['absent_header'])
                         ->first(); 
        $work_time     = WorkTime::where('id','=',$absent_header['work_time'])
                         ->first();
        $absent_time   = Carbon::createFromFormat('Y-m-d H:i:s', 
                         $absent_header['work_date']
                         .' '.$work_time['work_start']
                         ,'Asia/Jakarta'); 
        $lateTime      = $absent_time->addMinutes($work_time['max_late']);
        
        $checkin       = Carbon::now('Asia/Jakarta');
        $checkin->setTime( explode(":", $request['timein'])[0], explode(":", $request['timein'])[1], 0);
        $diff          = $lateTime->diffInMinutes( $checkin ,false);

        $absent        = new AbsentDetail();
        if ($diff > 0){
            $absent['status']   = 6;
        }
        else {
            $absent['status']   = 1;
        }
        $absent['employee']     = $request['employee_id'];
        $absent['check_in']     =  $checkin ;
        $absent['note']         = $request['note'];
        $absent['absent_header']= $absent_header['id'];
      
        $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, "Gagal");
        try {
           
            if ($request['detail_id'] != null){
                $absent2 = AbsentDetail::where('id','=',$request['detail_id'])->first();
                $absent2['check_in'] = $checkin ;
                $absent2['note'] = $request['note'];
                $absent2->update();
                $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $absent2);
            }
            else {
                 $absent->save();
                 $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $absent);
            }
            
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode      = $e->errorInfo[1];
            if($errorCode   == ErrorCode::$DUPLICATE_ENTRY){
               $response    = new MyResponse(ErrorCode::$DUPLICATE_ENTRY, ErrorDesc::$DUPLICATE_ENTRY, "Anda sudah melakukan absensi");
            }
            else {
                $response    = new MyResponse(ErrorCode::$EMPTY_DATA, ErrorDesc::$EMPTY_DATA, $e);
            }
        }
       
        return $response->get();
    }



    public function checkOut(Request $request)
    {
        $response;
        $checkUser = new ValidUser($request);
        if ($checkUser != ErrorCode::$OK){
            $response   = new MyResponse(ErrorCode::$INVALID_TOKEN, ErrorDesc::$INVALID_TOKEN, "-");
        }
        else {
            $absent = AbsentDetail::where('employee', '=', $request['employee_id'])
                      ->where('absent_header', '=', $request['absent_header'])->first();

            if (empty($absent)){
                 $response   = new MyResponse(ErrorCode::$NOT_CHECKIN, ErrorDesc::$NOT_CHECKIN, ErrorDesc::$NOT_CHECKIN);
            }
            else {
                if ($absent['check_out']== null){
                    $absenDB             = AbsentDetail::find($absent['id']);
                    $absent['check_out'] = Carbon::now('Asia/Jakarta')->toDateTimeString();
                    $update              = new Request();
                    $update['id']           = $absent['id'];
                    $update['check_in']     = $absent['check_in'];
                    $update['check_out']    = $absent['check_out'];
                    $update['status']       = $absent['status'];
                    $update['note']         = $absent['note'].'|'.$request['note'];
                    $update['absent_header']= $absent['absent_header'];
                    $absenDB->update($update->all());
                    $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, ErrorDesc::$OK);
                }
                else{
                    $response   = new MyResponse(ErrorCode::$ALLREADY_CHECKOUT, ErrorDesc::$ALLREADY_CHECKOUT, ErrorDesc::$ALLREADY_CHECKOUT);
                }
            }
            // $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $absent);
            return $response->get();
        }
    }

 public function manualCheckOut(Request $request)
    {
        $response;
        $absent = AbsentDetail::where('employee', '=', $request['employee_id'])
                      ->where('absent_header', '=', $request['absent_header'])->first();

        if (empty($absent)){
             $response   = new MyResponse(ErrorCode::$NOT_CHECKIN, ErrorDesc::$NOT_CHECKIN, ErrorDesc::$NOT_CHECKIN);
        }
        else {
            $checkin       = Carbon::now('Asia/Jakarta');
            $checkin->setTime( explode(":", $request['timein'])[0], explode(":", $request['timein'])[1], 0);

            $note = " ";
            $absenDB             = AbsentDetail::find($absent['id']);
            if ($absent['check_out'] != null){
                $note = explode("|", $absent['note'])[0].'|'.$request['note'];
             }
             else {
                $note = $absent['note'].'|'.$request['note'];
             }
            $update                = new Request();
            $update['id']           = $absent['id'];
            $update['check_in']     = $absent['check_in'];
            $update['check_out']    = $checkin;
            $update['status']       = $absent['status'];
            $update['note']         = $note;
            $update['absent_header']= $absent['absent_header'];
            $absenDB->update($update->all());
            $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, ErrorDesc::$OK);
        }
        // $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $absent);
        return $response->get();
    }



    public function getLongLat(Request $request) {
        $longlat      = DB::table('absent_config')->whereIn("mKey",['logitude','latitude'])->get();
        $data['longitude']  =  json_decode(json_encode($longlat[0]), true)['mValue'];
        $data['latitude']   =  json_decode(json_encode($longlat[1]), true)['mValue'];
        $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $data);
        return $response->get();
    }



}
