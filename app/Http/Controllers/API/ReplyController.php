<?php

namespace App\Http\Controllers\API;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reply;

use Validator;
use App\Http\Resources\Reply as ReplyResource;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;


class ReplyController extends BaseController
{
    public function store(Request $request)
    {
        $input = $request->all();
        $validator=Validator::make($input, [
        'reply_text'=>'required',
        'comment_id'=>'required',]);
        if ($validator->fails()) {
           return $this->sendError('validate Error',$validator->errors());
        }
         $reply = Reply::create([
            'reply_text' => $request->reply_text,
           'comment_id' =>$request->comment_id,
           'user_id' =>Auth::id(),
        ]); 

    return $this->msgResponse('reply created successfully');

    

    }
    
    public function show(Request $request)
    {
        
        $input = $request->all();
        $validator=Validator::make($input, [
        'comment_id'=>'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('validate Error',$validator->errors());
        }
        $replies=Reply::where('comment_id',$request->comment_id)->get();
        return $this->sendResponse(ReplyResource::collection($replies),'all replies ');

    }
}
