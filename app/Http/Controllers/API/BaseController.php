<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result,$message){
        $response = [
        'success' => true,
        'data'=> $result,
        'message' => $message,
        ];
        return response()->json($response,200);


    }
    public function sendError($error,$errorMessage=[],$code=404)
    {
        $response = [
            'success' => false,
            'data' => $error,
        ];
        if (!empty($errorMessage)){
            $response['data'] = $errorMessage;

        }
        return  response()->json($response,$code);


    }
     public function sendtowResponse($result1,$result2,$message){
        $response = [
        'success' => true,
        'data1'=> $result1,
        'data2'=> $result2,
        'message' => $message,
        ];
        return response()->json($response,200);


    }
    public function msgResponse($message){
        $response = [
        'success' => true,
        'message' => $message,
        ];
        return response()->json($response,200);


    }


}
