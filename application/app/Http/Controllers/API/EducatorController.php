<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Educator;
use Validator;
use App\Http\Resources\Educator as EducatorResource;
use App\Http\Controllers\API\BaseController as BaseController ;


class EducatorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educators=User::where('user_type',0)->get();
        return $this->sendResponse(EducatorResource::collection($educators),'all educators');
    }
    

    
}
