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
        'question_id'=>'required',]);
        if ($validator->fails()) {
           return $this->sendError('validate Error',$validator->errors());
        }
         $reply = Reply::create([
            'reply_text' => $request->reply_text,
           'question_id' =>$request->question_id,
           'user_id' =>Auth::id(),
        ]); 

    return $this->msgResponse('reply created successfully');

    

    }
    
    public function show(Request $request)
    {
        
        $input = $request->all();
        $validator=Validator::make($input, [
        'question_id'=>'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('validate Error',$validator->errors());
        }
        $replies=Reply::where('question_id',$request->question_id)->get();
        return $this->sendResponse(ReplyResource::collection($replies),'all replies ');

    }
}
