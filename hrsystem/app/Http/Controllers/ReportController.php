<?php

namespace App\Http\Controllers;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Container\Container;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ErrorCode;
use App\ErrorDesc;
use App\MyResponse;
use App\Http\Controllers\lib\MyPaginator;



class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.report.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStatus()
    {
       $users = DB::table('absent_status')->get();
        $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $users );
        return $response->get();
    }

    public function getEmployees()
    {
       $users = DB::table('employees')->get();
       $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $users );
       return $response->get();
    }

    public function getData(Request $request){
        if ( $request['level'] == '1'){
            return $this->level1($request['start_date'],$request['end_date']);
        }
        else {
            return $this->level2($request['header']);
        }
        
    }

 
    public function level1($start, $end)
    {
        $data = DB::select("call report_level1('".$start."','".$end."','1','1')");
       $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK,$data);
       return $response->get();
    }

    public function level2($header)
    {
        $data = DB::select("call report_level2('".$header."')");
       $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK,$data);
       return $response->get();
    }

 

    public function detial(Request $request)
    {
        $query = "select DATE_FORMAT(hd.work_date,'%W, %e %M %Y')as work_date  , em.name as employee, ws.name as status, if(ad.check_in is null,'-', substring(ad.check_in,12,19) ) as checkin, if(ad.check_out is null,'-', substring(ad.check_out,12,19) ) as checkout, ad.note
            FROM absent_header hd, absent_detail ad, employees em, absent_status ws
            where ad.absent_header = hd.id 
            and em.id = ad.employee
            and ws.id = ad.status
            and hd.work_date BETWEEN '2018-05-01' and '2018-05-03'
            order by hd.work_date ";
        $absents = new MyPaginator($query ,10);
        $absents = $absents->get();

        return view('admin.report.detail',compact('absents'))->with('i', ($request->input('page', 1) - 1) * 10);
    }



}
