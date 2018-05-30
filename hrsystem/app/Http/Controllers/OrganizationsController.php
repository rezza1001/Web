<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Employees;
use Illuminate\Support\Facades\DB;
use App\ErrorCode;
use App\ErrorDesc;
use App\MyResponse;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('organizations')
                    ->whereNotIn('id', [1])
                    ->get();
        $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $users );
        return $response->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orgExists = Organization::find($request['id']);
        $orgParent = Organization::find($request['parent'])->first();
        if (empty($orgExists['id']) ){
            $org = new Organization();
            $org['name']        = $request['name'];
            $org['description'] = $request['description'];
            $org['level']       = $orgParent['level']+1;
            $org['parent']      = $request['parent'];
            $org->save();
            $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $org);
            return $response->get();
        }
        else {
           $orgExists->update($request->all());
           $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $orgExists);
           return $response->get();
        }
    }


    public function delete(Request $request)
    {
         $orgChilds = Organization::where("parent","=",$request['id'])->get();
         $orgExists = Organization::where("id","=",$request['id'])->first();
         $employee = Employees::where("organization","=",$orgExists['id'])->get();
         if ($employee->count() > 0){
            $response   = new MyResponse(ErrorCode::$NOT_DELETE_ORG, ErrorDesc::$NOT_DELETE_ORG, $employee->count());
            return $response->get();
         }
         else if ($orgChilds->count() > 0){
             $response   = new MyResponse(ErrorCode::$NOT_DELETE_ORG, ErrorDesc::$NOT_DELETE_ORG, $employee->count());
             return $response->get();
         }
         else {
             $orgExists->delete();
             $response   = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, 0);
            return $response->get();
         }

    }
}
