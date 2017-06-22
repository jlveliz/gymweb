<?php

namespace GymWeb\Http\Controllers\Admin\Report;

use Illuminate\Http\Request;
use GymWeb\Http\Controllers\Controller;
use GymWeb\RepositoryInterface\MemberRepositoryInterface;

class MemberReportController extends Controller
{
    
	private $member;

    function __construct(MemberRepositoryInterface $member)
    {
    	$this->member = $member;
    }

    public function showReports()
    {
    	$members = $this->member->enum();
    	return view('admin.reports.member',compact('members'));
    }

    public function getAssistance(Request $params)
    {
    	
    }
}
