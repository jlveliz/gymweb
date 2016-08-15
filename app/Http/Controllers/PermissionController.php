<?php

namespace GymWeb\Http\Controllers;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\PermissionRequest;

use GymWeb\RepositoryInterface\PermissionRepositoryInterface; 

use Redirect;

class PermissionController extends Controller
{
    
	public $permission;

    public function __construct(PermissionRepositoryInterface $permission)
    {
    	$this->permission = $permission;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$permissions = $this->permission->enum();
		$data = [
			'permissions' => $permissions
		];
		return view('permission.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('permission.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PermissionRequest $request)
	{
		$data = $request->all();
		$permission = $this->permission->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($permission) {
			$sessionData['mensaje'] = 'Permiso Creado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Permiso no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('PermissionController@index')->with($sessionData);
		
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
		$permission = $this->permission->find($id);
		return view('permission.edit',['permission'=>$permission]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(PermissionRequest $request, $id)
	{
		$data = $request->all();
		$permission = $this->permission->edit($id,$data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($permission) {
			$sessionData['mensaje'] = 'Permiso Editado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Permiso no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('PermissionController@index')->with($sessionData);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$permission = $this->permission->remove($id);
		
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		
		if ($permission) {
			$sessionData['mensaje'] = 'Permiso Eliminado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Permiso no pudo ser eliminado, intente nuevamente';
		}
		
		return Redirect::action('PermissionController@index')->with($sessionData);
			
		
	}
}
