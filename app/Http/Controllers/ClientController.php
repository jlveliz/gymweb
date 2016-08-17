<?php

namespace GymWeb\Http\Controllers;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\ClientRequest;

use GymWeb\RepositoryInterface\ClientRepositoryInterface; 

use Redirect;

class ClientController extends Controller
{
    
	public $client;

    public function __construct(ClientRepositoryInterface $client)
    {
    	$this->client = $client;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = $this->client->enum();
		$data = [
			'clients' => $clients
		];
		return view('client.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('client.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ClientRequest $request)
	{
		$data = $request->all();
		$client = $this->client->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($client) {
			$sessionData['mensaje'] = 'Cliente Creado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Cliente no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('ClientController@index')->with($sessionData);
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$client = $this->client->find($id,false);
		if ($client) {
			return view('client.show',['client'=>$client]);
		}

		$sessionData['tipo_mensaje'] = 'error';
		$sessionData['mensaje'] = 'El Cliente no pudo ser encontrado';
		return Redirect::action('ClientController@index')->with($sessionData); 
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = $this->client->find($id);
		return view('client.edit',['client'=>$client]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ClientRequest $request, $id)
	{
		$data = $request->all();
		$client = $this->client->edit($id,$data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($client) {
			$sessionData['mensaje'] = 'Cliente Editado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Cliente no pudo ser creado, intente nuevamente';
		}
		
		return Redirect::action('ClientController@index')->with($sessionData);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$client = $this->client->remove($id);
		
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		
		if ($client) {
			$sessionData['mensaje'] = 'Cliente Eliminado Satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'El Cliente no pudo ser eliminado, intente nuevamente';
		}
		
		return Redirect::action('ClientController@index')->with($sessionData);
			
		
	}
}
