<?php

namespace GymWeb\Http\Controllers;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\BookTypeRequest;

use GymWeb\RepositoryInterface\BookTypeRepositoryInterface; 

use Redirect;

class BookTypeController extends Controller
{
    
	public $bookType;

    public function __construct(BookTypeRepositoryInterface $bookType)
    {
    	$this->bookType = $bookType;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bookTypes = $this->bookType->enum();
		$data = [
			'bookTypes' => $bookTypes
		];
		return view('bookType.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('bookType.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(BookTypeRequest $request)
	{
		$data = $request->all();
		$bookType = $this->bookType->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($bookType) {
			$sessionData['mensaje'] = 'Tipo de Subscripción Creado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Subscripción no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('BookTypeController@index')->with($sessionData);
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bookType = $this->bookType->find($id,false);
		if ($bookType) {
			return view('bookType.show',['bookType'=>$bookType]);
		}

		$sessionData['tipo_mensaje'] = 'error';
		$sessionData['mensaje'] = 'El Tipo de membresia no pudo ser encontrado';
		return Redirect::action('BookTypeController@index')->with($sessionData); 
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bookType = $this->bookType->find($id);
		if ($bookType) {
			return view('bookType.edit',['bookType'=>$bookType]);
		}

		$sessionData['tipo_mensaje'] = 'error';
		$sessionData['mensaje'] = 'El Tipo de membresia no pudo ser encontrado';
		return Redirect::action('BookTypeController@index')->with($sessionData); 
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(BookTypeRequest $request, $id)
	{
		$data = $request->all();
		$bookType = $this->bookType->edit($id,$data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($bookType) {
			$sessionData['mensaje'] = 'El tipo de membresia ha sido editado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El tipo de membresia no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('BookTypeController@index')->with($sessionData);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$bookType = $this->bookType->remove($id);
		
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		
		if ($bookType) {
			$sessionData['mensaje'] = 'Tipo de membresia Eliminado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Tipo de membresia no pudo ser eliminado, intente nuevamente';
		}
		
		return Redirect::action('BookTypeController@index')->with($sessionData);
			
		
	}
}
