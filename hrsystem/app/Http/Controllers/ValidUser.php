<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\MyResponse;
use App\ErrorCode;
use App\ErrorDesc;

class ValidUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $response ;
    public function __construct(Request $user)
    {
        $data_user  = User::where('id', '=', $user['user_id'])
                          ->where('remember_token',$user['token'])
                      ->first();
        if (empty($data_user)){
            $this->response = ErrorCode::$EMPTY_DATA;
        }
        else if ($data_user['imei'] == 'NULL' || empty($data_user['imei'])){
            $this->response = ErrorCode::$EMPTY_DATA;
        }
        else {
            $this->response = ErrorCode::$OK;
        }
    }

    public function __toString()
    {

        return $this->response;
    }

 
  
}
