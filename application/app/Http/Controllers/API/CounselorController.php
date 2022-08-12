<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use App\Http\Resources\Counselor as CounselorResource;

use App\Http\Controllers\API\BaseController as BaseController ;



class CounselorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counselors=User::where('user_type',1)->get();
        return $this->sendResponse(CounselorResource::collection($counselors),'all counselors');
    }

    
    

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy(Counselor $counselor)
    {
        $counselor->delete();
        return $this->sendResponse(new CounselorResource($counselor),'counselor deleted successfully');
    }*/
 //   function upload(Request $request){
  //      $counselor_image = $request->file('counselor_image');
    //    if($request->hasFile('counselor_image')){
      //      $new_name = rand().'.'.$image->getClientOriginalExtension();
        //    $counselor_image->move(public_path('/uploads/images'),$new_name);
          //  return response()->json($new_name);
        //}else{
          // return response()->json('image null');
        //}
    //}
}
