<?php

namespace GymWeb\Http\Controllers;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\BookRequest;

use GymWeb\RepositoryInterface\BookRepositoryInterface; 

use Redirect;

class BookController extends Controller
{
    
	public $book;

    public function __construct(BookRepositoryInterface $book)
    {
    	$this->book = $book;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($parent)
	{
		$books = $this->book->setParent($parent)->enum();
		$data = [
			'books' => $books
		];
		return view('book.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('book.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(BookRequest $request)
	{
		$data = $request->all();
		$book = $this->book->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($book) {
			$sessionData['mensaje'] = 'Cliente Creado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Cliente no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('BookRequest@index')->with($sessionData);
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$book = $this->book->find($id,false);
		if ($book) {
			return view('book.show',['book'=>$book]);
		}

		$sessionData['tipo_mensaje'] = 'error';
		$sessionData['mensaje'] = 'El Cliente no pudo ser encontrado';
		return Redirect::action('BookRequest@index')->with($sessionData); 
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$book = $this->book->find($id);
		return view('book.edit',['book'=>$book]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(BookRequest $request, $id)
	{
		$data = $request->all();
		$book = $this->book->edit($id,$data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($book) {
			$sessionData['mensaje'] = 'Cliente Editado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Cliente no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('BookRequest@index')->with($sessionData);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$book = $this->book->remove($id);
		
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		
		if ($book) {
			$sessionData['mensaje'] = 'Cliente Eliminado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Cliente no pudo ser eliminado, intente nuevamente';
		}
		
		return Redirect::action('BookRequest@index')->with($sessionData);
			
		
	}
}
