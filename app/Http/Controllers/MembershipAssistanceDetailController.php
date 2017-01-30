<?php

namespace GymWeb\Http\Controllers;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\MembershipAssistanceDetailRequest;

use GymWeb\RepositoryInterface\MembershipAssistanceDetailRepositoryInterface; 

use Redirect;

use GymWeb\Events\CheckStateMembership;

use Event;

class MembershipAssistanceDetailController extends Controller
{
    
	public $membershipDetailAssis;

    public function __construct(MembershipAssistanceDetailRepositoryInterface $membershipDetailAssis)
    {
    	$this->membershipDetailAssis = $membershipDetailAssis;
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
	public function create($parent)
	{ 
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($clientId, $membershipId, MembershipAssistanceDetailRequest $request)
	{
		$data = $request->all();
		$membershipDetailAssis = $this->membershipDetailAssis->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($membershipDetailAssis) {
			Event::fire(new CheckStateMembership($membershipDetailAssis));
			$sessionData['mensaje'] = 'La membresia se ha creado satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'La membresia del cliente no pudo ser creado, intente nuevamente';
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
