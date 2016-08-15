<?php

namespace GymWeb\Http\Controllers;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\RoleRequest;

use GymWeb\RepositoryInterface\RoleRepositoryInterface; 

use GymWeb\RepositoryInterface\PermissionRepositoryInterface; 

use Redirect;

class RoleController extends Controller
{
    
	public $role;
	public $permission;

    public function __construct(RoleRepositoryInterface $role, PermissionRepositoryInterface $permission)
    {
    	$this->role = $role;
    	$this->permission = $permission;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = $this->role->enum();
		$data = [
			'roles' => $roles
		];
		return view('role.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$permissions = $this->permission->enum();

		return view('role.create',compact('permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(RoleRequest $request)
	{
		$data = $request->all();
		$role = $this->role->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($role) {
			$sessionData['mensaje'] = 'Rol Creado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Rol no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('RoleController@index')->with($sessionData);
		
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
		$role = $this->role->find($id);
		return view('role.edit',['role'=>$role]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(RoleRequest $request, $id)
	{
		$data = $request->all();
		$role = $this->role->edit($id,$data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($role) {
			$sessionData['mensaje'] = 'Rol Editado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Rol no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('RoleController@index')->with($sessionData);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$role = $this->role->remove($id);
		
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		
		if ($role) {
			$sessionData['mensaje'] = 'Rol Eliminado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Rol no pudo ser eliminado, intente nuevamente';
		}
		
		return Redirect::action('RoleController@index')->with($sessionData);
			
		
	}
}
