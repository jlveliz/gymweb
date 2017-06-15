<?php

namespace GymWeb\Http\Controllers\Admin;

use GymWeb\Http\Controllers\Controller;
use GymWeb\Http\Requests;
use Illuminate\Http\Request;
use GymWeb\RepositoryInterface\MemberRepositoryInterface;
use GymWeb\RepositoryInterface\MembershipPaymentDetailRepositoryInterface;
use GymWeb\RepositoryInterface\MembershipTypeRepositoryInterface;
use GymWeb\RepositoryInterface\MembershipAssistanceDetailRepositoryInterface;

class DashboardController extends Controller
{
    
    private $members;
    private $payments;
    private $typeMembership;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MemberRepositoryInterface $members,MembershipPaymentDetailRepositoryInterface $payments, MembershipTypeRepositoryInterface $typeMembership, MembershipAssistanceDetailRepositoryInterface $assistance)
    {
        $this->middleware('auth');
        $this->members = $members;
        $this->payments = $payments;
        $this->typeMembership = $typeMembership;
        $this->assistance = $assistance;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDashboard()
    {
        $totalMembers = $this->members->enum();
        $todayPayments = $this->payments->totalPayToday();
        $typesMembership = $this->typeMembership->enum();
        $totalAssistance = $this->assistance->totalAssistanceToday();
        $totalAssistanceCurrentMonth = $this->assistance->totalCurrentMonth();
        $recentMembers = $this->members->recentMemberMonth();

        return view('admin.dashboard.index',[
            'totalMembers' => count($totalMembers), 
            'todayPayments' => $todayPayments,
            'totalTypeMembership' => count($typesMembership),
            'totalAssistance' => $totalAssistance,
            'totalAssistanceCurrentMonth' => $totalAssistanceCurrentMonth,
            'recentMembers' => $recentMembers
        ]);
    }
}
