<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use Illuminate\Support\Facades\Auth;*/


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        /*if(Auth::user()->hasRole('educator')){
            return view('educatordashboard');
        }elseif (Auth::user()->hasRole('counselor')) {
            return view('counselordashboard');

        }elseif (Auth::user()->hasRole('admin')) {
            return view('admindashboard');}*/

    }
}
