<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\CounselorController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\LikeController;
use App\Http\Controllers\API\ReplyController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register','API\AuthController@register');
Route::post('login','API\AuthController@login');
//Route::middleware('auth:api')->post('logout','API\AuthController@logout');

Route::middleware('auth:api')->group( function () {
    Route::resource('posts','API\PostController');
    Route::resource('counselors','API\CounselorController');
    Route::resource('educators','API\EducatorController');
    Route::get('profile', [App\Http\Controllers\API\UsersController::class, 'profile']);
    Route::post('updateprofile', [App\Http\Controllers\API\UsersController::class, 'update']);
	Route::post('showcomments', [App\Http\Controllers\API\CommentController::class, 'show']);
    Route::post('storecomment', [App\Http\Controllers\API\CommentController::class, 'store']);
    Route::post('numcomment', [App\Http\Controllers\API\CommentController::class, 'numcomment']);
	Route::post('storelike', [App\Http\Controllers\API\LikeController::class, 'store']);
    Route::post('showusers', [App\Http\Controllers\API\LikeController::class, 'showusers']);
    Route::post('numlike', [App\Http\Controllers\API\LikeController::class, 'numlike']);
	Route::post('showreply', [App\Http\Controllers\API\ReplyController::class, 'show']);
    Route::post('storereply', [App\Http\Controllers\API\ReplyController::class, 'store']);
    

    
});

