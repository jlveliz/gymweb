<?php

namespace GymWeb\Http\Controllers\Admin\Member;

use Illuminate\Http\Request;

use GymWeb\Http\Controllers\Controller;

use GymWeb\Http\Requests\MemberRequest;

use GymWeb\RepositoryInterface\MemberRepositoryInterface; 


class MemberController extends Controller
{
    
	public $member;

    public function __construct(MemberRepositoryInterface $member)
    {
    	$this->member = $member;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$members = $this->member->enum();
		$data = [
			'members' => $members
		];
		return view('admin.member.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.member.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(MemberRequest $request)
	{
		$data = $request->all();
		$member = $this->member->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($member) {
			$sessionData['mensaje'] = 'Miembro Creado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Miembro no pudo ser creado, intente nuevamente';
		}
		
		return redirect()->route('admgym.members.show',$member->id)->with($sessionData);
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$member = $this->member->find($id,false);
		if ($member) {
			return view('admin.member.show',['member'=>$member]);
		}

		$sessionData['tipo_mensaje'] = 'error';
		$sessionData['mensaje'] = 'El Miembro no pudo ser encontrado';
		return redirect('admgym.members.show',$member->id)->route()->with($sessionData);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$member = $this->member->find($id);
		return view('admin.member.edit',['member'=>$member]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(MemberRequest $request, $id)
	{
		$data = $request->all();
		$member = $this->member->edit($id,$data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($member) {
			$sessionData['mensaje'] = 'Miembro Editado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Miembro no pudo ser creado, intente nuevamente';
		}
		
		return redirect()->route('admgym.members.edit',$member->id)->with($sessionData);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$member = $this->member->remove($id);
		
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		
		if ($member) {
			$sessionData['mensaje'] = 'Miembro Eliminado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Miembro no pudo ser eliminado, intente nuevamente';
		}
		
		return redirect()->route('admgym.members.index')->with($sessionData);
			
		
	}
}
