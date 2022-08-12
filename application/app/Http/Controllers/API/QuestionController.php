<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use Validator;
use App\Http\Resources\Question as QuestionResource;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;



class QuestionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::all();
        return $this->sendResponse(QuestionResource::collection($questions),
        'All questions sent');
    }

    
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'countent'=> 'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('Please validate error',$validator->errors());
        }
        $question = Question::create([
           'countent' =>$request->countent,
           'user_id' =>Auth::id()
        ]); 
        return $this->msgResponse('question created successfully');

       

    }
}
