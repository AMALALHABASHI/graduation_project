<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Counselor as CounselorResource;
use App\Http\Controllers\API\BaseController as BaseController ;



class UsersController extends BaseController
{
	 public function profile()
    {
        
        $user=User::find(Auth::id());
        if (is_null($user)) {
            return $this->sendError('user not found');
        }
            return $this->sendResponse(new CounselorResource($user),'userr found successfully');

    }
	    public function update(Request $request)
    {
        $input = $request->all();
        $validator=Validator::make($input, [
        'user_image'=>'image|mimes:jpg,jpeg,gif,png',
        'name'=>'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('validate Error',$validator->errors());
        }
        $user=User::find(Auth::id());
        if($request->user_image){
    $user->user_image=$input['user_image'];
    $newphoto = time().$input['user_image'].getClientOriginalName();
    $input['user_image']->move('uploads/images'.$newphoto);}
    $user->name=$input['name'];
    $user->update();
    return $this->msgResponse('user updated successfully');
    }
}
