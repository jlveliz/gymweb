<?php

namespace GymWeb\Http\Controllers\Admin;

use GymWeb\Http\Controllers\Controller;
use GymWeb\Http\Requests;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function showDashboard()
    {
        return view('admin.dashboard.index');
    }
}
