<?php

namespace GymWeb\Http\Controllers\Client;

use GymWeb\Http\Controllers\Controller;
use GymWeb\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:member');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHome()
    {
        return view('client.home.index');
    }
}
