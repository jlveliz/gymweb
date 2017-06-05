<?php

namespace GymWeb\Http\Controllers\Admin\Membership;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\MembershipPaymentDetailRequest;

use GymWeb\RepositoryInterface\MembershipPaymentDetailRepositoryInterface; 

use GymWeb\Events\CheckStateMembership;

use GymWeb\Http\Controllers\Controller;

use GymWeb\Models\Membership;

class MembershipPaymentDetailController extends Controller
{
    
	public $membershipDetail;

    public function __construct(MembershipPaymentDetailRepositoryInterface $membershipDetail)
    {
    	// $this->middleware('pay');
    	$this->membershipDetail = $membershipDetail;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($memberId, $membershipId)
	{
		$payments = $this->membershipDetail->setParent($membershipId)->enum();
		return view("admin.memberships.payment.index",compact('payments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($memberId, $membershipId)
	{ 
		$balance = ( Membership::find($membershipId)->price - Membership::find($membershipId)->getSumPayments());
		return view('admin.memberships.payment.create',['client_id'=>$memberId,'membership_id'=>$membershipId,'balance'=>$balance]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($memberId, $membershipId, MembershipPaymentDetailRequest $request)
	{
		$data = $request->all();
		$membershipDetail = $this->membershipDetail->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($membershipDetail) {
			event(new CheckStateMembership($membershipDetail));
			$sessionData['mensaje'] = 'Se ha realizado un pago a la membresia satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'No se pudo realizar la transacción, intente nuevamente.';
		}
		
		return redirect()->route('admgym.members.show',$memberId)->with($sessionData);
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(MembershipRequest $request, $id)
	{
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}
}
