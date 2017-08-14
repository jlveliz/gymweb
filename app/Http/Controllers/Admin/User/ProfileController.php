<?php

namespace GymWeb\Http\Controllers\Admin\User;

use Illuminate\Http\Request;

use GymWeb\Http\Controllers\Controller;

use GymWeb\RepositoryInterface\UserRepositoryInterface; 

class ProfileController extends Controller {

	
	public function __construct(UserRepositoryInterface $user)
    {
    	$this->middleware('auth');
    	$this->user = $user;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.profile.index');
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$data = $request->all();
		$user = $this->user->edit($id,$data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($user) {
			$sessionData['mensaje'] = 'Usuario Editado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El usuario no pudo ser creado, intente nuevamente';
		}
		
		return redirect()->back()->with($sessionData);
	}




}