<?php

namespace GymWeb\Http\Controllers\Admin\Membership;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\MembershipTypeRequest;

use GymWeb\RepositoryInterface\MembershipTypeRepositoryInterface; 

use GymWeb\RepositoryInterface\DivisionRepositoryInterface; 

use GymWeb\Http\Controllers\Controller;

use Redirect;

class MembershipTypeController extends Controller
{
    
	public $membershipType;

	public $division;

    public function __construct(MembershipTypeRepositoryInterface $membershipType, DivisionRepositoryInterface $division)
    {
    	$this->middleware('auth');
    	$this->membershipType = $membershipType;
    	$this->division = $division;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$membershipTypes = $this->membershipType->enum();
		$data = [
			'membershipTypes' => $membershipTypes
		];
		return view('admin.memberships.type.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = [
			'divisions' => $this->division->enum()
		];
		return view('admin.memberships.type.create',$data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(MembershipTypeRequest $request)
	{
		$data = $request->all();
		$membershipType = $this->membershipType->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($membershipType) {
			$sessionData['mensaje'] = 'Tipo de Subscripción Creado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Subscripción no pudo ser creado, intente nuevamente';
		}
		return redirect()->route('admgym.memberships.types.edit',$membershipType->id)->with($sessionData);
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$membershipType = $this->membershipType->find($id,false);
		if ($membershipType) {
			return view('admin.memberships.type.show',['membershipType'=>$membershipType]);
		}

		$sessionData['tipo_mensaje'] = 'error';
		$sessionData['mensaje'] = 'El Tipo de membresia no pudo ser encontrado';
		return redirect()->route('admgym.memberships.types.index')->with($sessionData);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$membershipType = $this->membershipType->find($id);
		if ($membershipType) {
			return view('admin.memberships.type.edit',['membershipType'=>$membershipType,'divisions' => $this->division->enum()]);
		}

		$sessionData['tipo_mensaje'] = 'error';
		$sessionData['mensaje'] = 'El Tipo de membresia no pudo ser encontrado';
		return redirect()->route('admgym.memberships.types.edit',$membershipType->id)->with($sessionData);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(MembershipTypeRequest $request, $id)
	{
		$data = $request->all();
		$membershipType = $this->membershipType->edit($id,$data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($membershipType) {
			$sessionData['mensaje'] = 'El tipo de membresia ha sido editado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El tipo de membresia no pudo ser creado, intente nuevamente';
		}
		
		return redirect()->route('admgym.memberships.types.edit',$membershipType->id)->with($sessionData);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$membershipType = $this->membershipType->remove($id);
		
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		
		if ($membershipType) {
			$sessionData['mensaje'] = 'Tipo de membresia Eliminado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Tipo de membresia no pudo ser eliminado, intente nuevamente';
		}
		return redirect()->route('admgym.memberships.types.index')->with($sessionData);	
		
	}
}
