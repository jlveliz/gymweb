<?php

namespace GymWeb\Http\Controllers\Admin\Membership;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\DivisionRequest;

use GymWeb\RepositoryInterface\DivisionRepositoryInterface; 

use GymWeb\Http\Controllers\Controller;

use Redirect;

class DivisionController extends Controller
{
    
	public $division;

    public function __construct(DivisionRepositoryInterface $division)
    {
    	$this->middleware('auth');
    	$this->division = $division;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$divisions = $this->division->enum();
		$data = [
			'divisions' => $divisions
		];
		return view('admin.memberships.division.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.memberships.division.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(DivisionRequest $request)
	{
		$data = $request->all();
		$division = $this->division->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($division) {
			$sessionData['mensaje'] = 'La división ha sido creado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'La división no pudo ser creada, intente nuevamente';
		}
		
		return redirect()->route('admgym.memberships.divisions.edit',$division->id)->with($sessionData);
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$division = $this->division->find($id,false);
		if ($division) {
			return view('admin.memberships.division.show',['division'=>$division]);
		}

		$sessionData['tipo_mensaje'] = 'error';
		$sessionData['mensaje'] = 'La división no pudo ser encontrada';
		return redirect()->route('admgym.memberships.divisions.index')->with($sessionData);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$division = $this->division->find($id);
		if ($division) {
			return view('admin.memberships.division.edit',['division'=>$division]);
		}

		$sessionData['tipo_mensaje'] = 'error';
		$sessionData['mensaje'] = 'La división no pudo ser encontrada';
		return redirect()->route('admgym.memberships.divisions.index')->with($sessionData);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(DivisionRequest $request, $id)
	{
		$data = $request->all();
		$division = $this->division->edit($id,$data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($division) {
			$sessionData['mensaje'] = 'La división ha sido editada satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'La división no pudo ser actualizada, intente nuevamente';
		}
		return redirect()->route('admgym.memberships.divisions.edit',$division->id)->with($sessionData);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$division = $this->division->remove($id);
		
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		
		if ($division) {
			$sessionData['mensaje'] = 'La divsión fue Eliminada Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'La división no pudo ser eliminada, intente nuevamente';
		}
		return redirect()->route('admgym.memberships.divisions.index')->with($sessionData);			
		
	}
}
