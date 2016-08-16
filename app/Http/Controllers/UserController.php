<?php

namespace GymWeb\Http\Controllers;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\UserRequest;

use GymWeb\RepositoryInterface\UserRepositoryInterface;

use GymWeb\RepositoryInterface\RoleRepositoryInterface;

use Response;

use Redirect;

class UserController extends Controller
{
    
	public $user;

	public $role;

    public function __construct(UserRepositoryInterface $user, RoleRepositoryInterface $role)
    {
    	$this->user = $user;
    	$this->role = $role;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->enum();
		$data = [
			'users' => $users
		];
		return view('user.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles = $this->role->enum();
		return view('user.create',compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
		$data = $request->all();
		$user = $this->user->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($user) {
			$sessionData['mensaje'] = 'Usuario Creado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El usuario no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('UserController@index')->with($sessionData);
		
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
		$user = $this->user->find($id);
		$roles = $this->role->enum();

		foreach ($roles as $key => $role) {
			foreach ($user->roles as $key => $rolUser) {
				if ($rolUser->id == $role->id) {
					$role->checked = true;
				} 
			}
		}

		return view('user.edit',[
			'user'=>$user,
			'roles'=>$roles
			]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UserRequest $request, $id)
	{
		$data = $request->all();
		$user = $this->user->edit($id,$data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($user) {
			$sessionData['mensaje'] = 'Usuario Editado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El usuario no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('UserController@index')->with($sessionData);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$user = $this->user->remove($id);
		
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		
		if ($user) {
			$sessionData['mensaje'] = 'Usuario Eliminado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El usuario no pudo ser eliminado, intente nuevamente';
		}
		
		return Redirect::action('UserController@index')->with($sessionData);
			
		
	}
}
