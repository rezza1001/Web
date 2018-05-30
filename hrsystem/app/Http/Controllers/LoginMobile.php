<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\ErrorCode;
use App\ErrorDesc;
use App\UserRole;
use App\MyResponse;

class LoginMobile extends Controller 
{
    public function index()
    {
        return "Login Mobile Controller";
    }

    public function login(Request $request)
    {
    	 $email 	= $request['username'];
    	 $password 	= $request['password'];

	  	if (Auth::attempt(['email' => $email, 'password' => $password ])) {
	  		$data_user 		= User::where('email', '=', $email)->first();
	  		$user  			= User::find($data_user['id']);
	  		$role 			= $this->chekRoloe($data_user['id'])['role'];

	  		if ($role == UserRole::$ADMIN || $role == UserRole::$SUPERUSER){
	  			$respnse = new MyResponse(ErrorCode::$ACCESS_DENIED, ErrorDesc::$ACCESS_DENIED,$user );
				return $respnse->get();
	  		}

	  		if ($this->checkImei($user, $request)){
	  			$request['remember_token'] 	= $user-> generateToken();
		  		$request['password'] 		= $data_user['password'];
		  		$user->update($request->all());
	  			$respnse = new MyResponse(ErrorCode::$OK, ErrorDesc::$OK, $user );
				return $respnse->get() ;
	  		}
	  		else {
	  			$respnse = new MyResponse(ErrorCode::$ERROR_LOGIN, ErrorDesc::$ERROR_LOGIN,'-');
				return $respnse->get() ;
	  		}
		}
		else {
		  	$respnse = new MyResponse(ErrorCode::$ERROR_LOGIN, ErrorDesc::$ERROR_LOGIN,'-');
			return $respnse->get() ;
		}
	}

	public function checkImei(User $user, Request $request)
	{
		if ($user['imei'] == NULL){
			return true;
		}
		else {
			if ($user['imei'] != $request['imei'] ){
				return false;
			}
			else {
				return true;
			}
			
		}

	}

	public function chekRoloe($userid)
	{
		 $role = UserRole::where('user', '=', $userid)->first();
		 return $role ;
	}

}
