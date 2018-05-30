<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\educations;
use App\User;
use App\Employees;
use App\Absent;
use App\UserRole;
use App\ErrorCode;
use App\ErrorDesc;
use App\MyResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class RegisterEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $response;
       $data_response;
       $user  = new User();
       $user['password'] = Hash::make("asdqwe");
       $user['email']    = $request['email'];
       try {
            $user->save();
            $data_response['user'] = $user;
       } catch (\Illuminate\Database\QueryException $ex) {
            $response = new MyResponse(ErrorCode::$DUPLICATE_ENTRY, ErrorDesc::$DUPLICATE_ENTRY, $ex->getMessage() );
            return  $response->get();
       }

       $user_role = new UserRole();
       $user_role['user'] = $user['id'];
       $user_role['role'] = 3;
       $user_role->save();
       $data_response['user_role'] = $user_role;

       $dob_ex = explode("/", $request['dob']);

       $employee = new Employees();
       $employee ['user']       = $user['id'];
       $employee ['name']       = $request['name'];
       $employee ['gender']     = $request['gender'];
       $employee ['address']    = $request['address'];
       $employee ['phone']      = $request['phone1'];
       $employee ['alt_phone']  = $request['phone2'];
       $employee ['npwp']       = $request['npwp'];
       $employee ['email']      = $request['email'];
       $employee ['pob']        = $request['pob'];
       $employee ['no_id']        = $request['ktp'];
       $employee ['organization']        = $request['position'];
       $employee ['dob']        = Carbon::createFromDate($dob_ex[2], $dob_ex[1], $dob_ex[0]);
       $employee->save();
       $data_response['employee'] = $employee;

       if (count($request['school']) > 0){
          foreach($request['school'] as $school) { 
                $this->saveEducation($school, $employee['id']);
          }
       }
  
        $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $data_response);
        return $response->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
