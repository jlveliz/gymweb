<?php

namespace GymWeb\Http\Controllers;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\BookDetailRequest;

use GymWeb\RepositoryInterface\BookDetailRepositoryInterface; 

use Redirect;

use GymWeb\Events\CheckStateBook;

use Event;

class BookDetailController extends Controller
{
    
	public $bookDetail;

    public function __construct(BookDetailRepositoryInterface $bookDetail)
    {
    	$this->bookDetail = $bookDetail;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($parent)
	{
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($parent)
	{ 
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($clientId, $bookId, BookDetailRequest $request)
	{
		$data = $request->all();
		$bookDetail = $this->bookDetail->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($bookDetail) {
			Event::fire(new CheckStateBook($bookDetail));
			$sessionData['mensaje'] = 'La cartilla se ha creado satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'La cartilla del cliente no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('ClientController@show',$clientId)->with($sessionData);
		
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
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(BookRequest $request, $id)
	{
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}
}
