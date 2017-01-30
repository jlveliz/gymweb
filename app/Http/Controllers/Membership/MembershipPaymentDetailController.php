<?php

namespace GymWeb\Http\Controllers\Membership;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\MembershipPaymentDetailRequest;

use GymWeb\RepositoryInterface\MembershipPaymentDetailRepositoryInterface; 

use Redirect;

use GymWeb\Events\CheckStateMembership;

use GymWeb\Http\Controllers\Controller;

use GymWeb\Models\Membership;

use Event;

class MembershipPaymentDetailController extends Controller
{
    
	public $membershipDetail;

    public function __construct(MembershipPaymentDetailRepositoryInterface $membershipDetail)
    {
    	$this->middleware('pay');
    	$this->membershipDetail = $membershipDetail;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($parent)
	{
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($clientId, $membershipId)
	{ 
		$balance = ( Membership::find($membershipId)->price - Membership::find($membershipId)->getSumPayments());
		return view('memberships.payment.create',['client_id'=>$clientId,'membership_id'=>$membershipId,'balance'=>$balance]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($clientId, $membershipId, MembershipPaymentDetailRequest $request)
	{
		$data = $request->all();
		$membershipDetail = $this->membershipDetail->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($membershipDetail) {
			Event::fire(new CheckStateMembership($membershipDetail));
			$sessionData['mensaje'] = 'Se ha realizado un pago a la membresia satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'No se pudo realizar la transacción, intente nuevamente.';
		}
		
		return Redirect::action('ClientController@show',$clientId)->with($sessionData);
		
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
