<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Models\Like;
use Validator;
use App\Http\Resources\Like as LikeResource;
use App\Http\Resources\User as UserResource;

use App\Http\Controllers\API\BaseController as BaseController ;


class LikeController extends BaseController
{

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator=Validator::make($input, [
        'post_id'=>'required',]);
        if ($validator->fails()) {
           return $this->sendError('validate Error',$validator->errors());
        }
         Like::create([
           'post_id' =>$request->post_id,
           'user_id' =>Auth::id(),
        ]); 

    return $this->msgResponse('like created successfully');

    

    }
    
    public function showusers(Request $request)
    {
        
        $input = $request->all();
        $validator=Validator::make($input, [
        'post_id'=>'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('validate Error',$validator->errors());
        }
        $user_id=Like::where('post_id',$request->post_id)->pluck('user_id');
        $users=User::whereIn('id',$user_id)->get();
        return $this->sendResponse(UserResource::collection($users),'all users ');

    }
    
   
    public function numlike(Request $request){
        $input = $request->all();
        $validator=Validator::make($input, [
        'post_id'=>'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('validate Error',$validator->errors());
        }
        $num=Like::where('post_id',$request->post_id)->count();
        return $this->sendResponse($num,'all likes ');

    }
}
