<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

use Validator;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Controllers\API\BaseController as BaseController ;
use Illuminate\Support\Facades\Auth;



class CommentController extends BaseController
{

    public function store(Request $request)
    {
        $input = $request->all();
        $validator=Validator::make($input, [
        'comment_text'=>'required',
        'post_id'=>'required',]);
        if ($validator->fails()) {
           return $this->sendError('validate Error',$validator->errors());
        }
         $comment = Comment::create([
            'comment_text' => $request->comment_text,
           'post_id' =>$request->post_id,
           'user_id' =>Auth::id(),
        ]); 

    return $this->msgResponse('comment created successfully');

    

    }
    
    public function show(Request $request)
    {
        
        $input = $request->all();
        $validator=Validator::make($input, [
        'post_id'=>'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('validate Error',$validator->errors());
        }
        $comments=Comment::where('post_id',$request->post_id)->get();
        return $this->sendResponse(CommentResource::collection($comments),'all comments ');

    }
    
   
    public function numcomment(Request $request){
        $input = $request->all();
        $validator=Validator::make($input, [
        'post_id'=>'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('validate Error',$validator->errors());
        }
        $num=Comment::where('post_id',$request->post_id)->count();
        return $this->sendResponse($num,'all comments ');

    }
}
