<?php
namespace GymWeb\Http\Controllers\Admin\Log;

use GymWeb\Http\Requests;
use Illuminate\Http\Request;
use GymWeb\RepositoryInterface\MemberAccessLogRepositoryInterface;
use GymWeb\Http\Controllers\Controller;

class MemberAccessLogController extends Controller
{
    
    protected $memberAccess;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MemberAccessLogRepositoryInterface $memberAccess)
    {
        $this->middleware('auth');
        $this->memberAccess = $memberAccess;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registers = $this->memberAccess->enum();
        return view('admin.logs.member',['registers'=>$registers]);
    }
}
