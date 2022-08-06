<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Validator;
use App\Http\Resources\Post as PostResource;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;


 

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return $this->sendResponse(PostResource::collection($posts),
        'All Posts sent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function create()
    //{
        //
    //}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'title'=>'required',
            'countent'=> 'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('Please validate error',$validator->errors());
        }
        $post = Post::create([
            'title' => $request->title,
           'countent' =>$request->countent,
           'user_id' =>Auth::id()
        ]); 
        return $this->msgResponse('Post created successfully');

       

    }


   // function upload(Request $request){
     //   $counselor_image = $request->file('counselor_image');
       // if($request->hasFile('counselor_image')){
         //   $new_name = rand().'.'.$image->getClientOriginalExtension();
           // $counselor_image->move(public_path('/uploads/images'),$new_name);
            //return response()->json($new_name);
        //}else{
          // return response()->json('image null');
        //}
    //}
}
