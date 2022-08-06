<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Counselor;
use App\Models\Educator;
use App\Http\Controllers\API\BaseController as BaseController ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Validator;
class AuthController extends BaseController
{
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            
        ]);
        if ($validator->fails()) {
      	    return $this->sendError('validate Error',$validator->errors());
        }
    
            $input = $request->all();
            $input['password']=Hash::make($input['password']);
            $user=User::create($input);
             if($request->user_type == 1 ) {
                $data = $request->all();
                $data['counselor_name'] = $request->name;
                Counselor::create($data);
            }  elseif ($request->user_type == 0){
                $data = $request->all();
                Educator::create($data);
            }
            $success['token']=$user->createToken('mohammad1999')->accessToken; 
            $success['name']=$user->name;
        return $this->sendResponse($success,'User registered successfully');
        //$user->attachRole('user');
        return $user;
    }
      public function login(Request $request)
    {


    	if(Auth::attempt(['email'=>$request->email , 'password'=>$request->password])){
 			$user = Auth::user();
 			$success['token']=$user->createToken('mohammad1999')->accessToken;
        	$success['name']=$user->name;
        	return $this->sendResponse($success,'User registered successfully');

    	}
        
        else{
        	return $this->sendError('unauthorized',['error'=>'unauthorized']);
        }
    }
    /*public function logout(){
        if(auth()->user()){
            $user = auth()->user();
            $user->delete();
            return $this->sendResponse(['message'=>'thank you for using application']);
        }

    }*/

}
