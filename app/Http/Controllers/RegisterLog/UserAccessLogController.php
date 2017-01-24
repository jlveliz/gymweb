<?php
namespace GymWeb\Http\Controllers\RegisterLog;

use GymWeb\Http\Requests;
use Illuminate\Http\Request;
use GymWeb\RepositoryInterface\UserAccessLogRepositoryInterface;
use GymWeb\Http\Controllers\Controller;

class UserAccessLogController extends Controller
{
    
    protected $userAccess;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserAccessLogRepositoryInterface $userAccess)
    {
        $this->middleware('auth');
        $this->userAccess = $userAccess;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registers = $this->userAccess->enum();
        return view('registers.user-access-log.index',['registers'=>$registers]);
    }
}
