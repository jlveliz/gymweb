<?php

namespace GymWeb\Http\Controllers\Admin\Report;

use Illuminate\Http\Request;
use GymWeb\Http\Controllers\Controller;
use GymWeb\RepositoryInterface\MemberRepositoryInterface;
use GymWeb\RepositoryInterface\MembershipAssistanceDetailRepositoryInterface;

class MemberReportController extends Controller
{
    
    private $member;
	private $assistance;

    function __construct(MemberRepositoryInterface $member, MembershipAssistanceDetailRepositoryInterface $assistance)
    {
        $this->member = $member;
    	$this->assistance = $assistance;
    }

    public function showReports()
    {
    	$members = $this->member->enum();
    	return view('admin.reports.member',compact('members'));
    }

    public function getAssistance(Request $request)
    {
    	$asisstances = $this->assistance->reportCountAssistances($request->all());
        return response()->json($asisstances,200);
    }

    public function printAssistance($format)
    {
        dd($format);
    }
}
