<?php

namespace GymWeb\Http\Controllers\Admin;

use GymWeb\Http\Controllers\Controller;
use GymWeb\Http\Requests;
use Illuminate\Http\Request;
use GymWeb\RepositoryInterface\MemberRepositoryInterface;

class DashboardController extends Controller
{
    
    private $members;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MemberRepositoryInterface $members)
    {
        $this->middleware('auth');
        $this->members = $members;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDashboard()
    {
        $totalMembers = $this->members->enum();
        return view('admin.dashboard.index',['totalMembers' => count($totalMembers)]);
    }
}
