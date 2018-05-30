<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\educations;
use App\Employees;
use App\User;
use App\MyResponse;
use App\Organization;
use App\ErrorCode;
use App\ErrorDesc;
use Carbon\Carbon;
use App\Http\Controllers\ValidUser;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereNotIn('id', [1])->pluck("id");
        // $employee = Employees::whereIn('user',$users)->latest('created_at')->paginate(10);
        $employee  = DB::table('employees')
                     ->join('users','users.id','=','employees.user')
                     ->join('organizations','organizations.id','=','employees.organization')
                     ->select('users.id as userid','users.email as user_email', 'employees.name as fullname', 'employees.phone as phone', 'organizations.name as position')
                     ->orderBy('employees.name', 'asc')
                     ->paginate(10);
        return view('admin.employee.index',compact('employee'));
    }


    public function updateEmployee(Request $request)
    {
       $response;
       $data_response;
       $user  = User::where('id','=',$request['employee_id']);
       $update_user  = new Request();
       $update_user['email'] = $request['email'];
       $user->update($update_user->all());

       $dob_ex = explode("/", $request['dob']);
       $employee = Employees::where("user","=",$request['employee_id'])->first();
       $update              = new Request();
       $update ['name']       = $request['name'];
       $update ['gender']     = $request['gender'];
       $update ['address']    = $request['address'];
       $update ['phone']      = $request['phone1'];
       $update ['alt_phone']  = $request['phone2'];
       $update ['email']      = $request['email'];
       $update ['pob']        = $request['pob'];
       $update ['no_id']        = $request['ktp'];
       $update ['npwp']        = $request['npwp'];
       $update ['organization']        = $request['position'];
       $update ['dob']        = Carbon::createFromDate($dob_ex[2], $dob_ex[1], $dob_ex[0]);
       $employee->update($update->all());
       $data_response['employee'] = $employee;

       $education = educations::where('employee', '=', $employee['id']);
       if ($education != null){
            $education->delete();
       }
       if (count($request['school']) > 0){
          foreach($request['school'] as $school) { 
                $this->saveEducation($school,$employee['id']);
          }
       }
  
        $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $data_response);
        return $response->get();
    }

    public function saveEducation($school, $user)
    {

        $education = new educations();
        $education['employee']   = $user;
        $education['school_name']   = $school['name'];
        $education['major']         = $school['majors'];
        $education['start_year']    = $school['started_year'];
        $education['end_year']      = $school['ended_year'];
        $education['degree']        = $school['degree'];

        $education->save();
    }


    public function openDetail(Request $request)
    {
       $employee  = DB::table('employees')
                 ->join('users','users.id','=','employees.user')
                 ->join('organizations','organizations.id','=','employees.organization')
                 ->where('users.id','=',$request['user'])
                 ->select('users.id as userid','users.email as user_email', 'employees.*', 'organizations.id as org')
                 ->orderBy('employees.name', 'asc')->get();
        $employee = json_decode(json_encode($employee[0]), true);
        $education = DB::table('educations')->where('employee','=',$employee['id'])->get();
        $employee['school'] = $education;

        $respnse        = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK,$employee);
        return $respnse->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $checkUser = new ValidUser($request);
        if ($checkUser != ErrorCode::$OK){
            $response   = new MyResponse(ErrorCode::$INVALID_TOKEN, ErrorDesc::$INVALID_TOKEN, "-");
            return $response->get();
        }
        else {
            $userid         = $request['user_id'];
            $data           = Employees::where('user', '=', $userid)->first();
            $organization   = Organization::where('id', '=', $data['organization'])->first();
            $data['organization'] = $organization;
            $respnse        = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK,$data);
            return $respnse->get();
        }
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function changePassword(Request $request)
    {
        $user             = User::find($request['user_id']);
        $user['password'] = bcrypt($request['password']);
        $user->update();
        $respnse        = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK,$user);
        return $respnse->get();
    }

}
