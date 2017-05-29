<?php

namespace GymWeb\Http\Controllers\Admin\User;

use Illuminate\Http\Request;

use GymWeb\Http\Controllers\Controller;

use GymWeb\Http\Requests\PermissionRequest;

use GymWeb\RepositoryInterface\PermissionRepositoryInterface; 


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
		return view('admin.permission.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.permission.create');
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
			$sessionData['mensaje'] = 'Permiso Creado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Permiso no pudo ser creado, intente nuevamente';
		}

		return redirect()->route('admgym.permissions.edit',$permission->id)->with($sessionData);
		
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
		return view('admin.permission.edit',['permission'=>$permission]);
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
			$sessionData['mensaje'] = 'Permiso Editado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Permiso no pudo ser creado, intente nuevamente';
		}
		
		return redirect()->route('admgym.permissions.edit',$permission->id)->with($sessionData);
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
			$sessionData['mensaje'] = 'Permiso Eliminado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Permiso no pudo ser eliminado, intente nuevamente';
		}
		
		return redirect()->route('admgym.permissions.index')->with($sessionData);
			
		
	}
}
