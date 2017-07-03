<?php

namespace GymWeb\Http\Controllers\Admin\Membership;

use Illuminate\Http\Request;

use GymWeb\Http\Requests\CategoryRequest;

use GymWeb\RepositoryInterface\CategoryRepositoryInterface; 

use GymWeb\Http\Controllers\Controller;

use Redirect;

class CategoryController extends Controller
{
    
	public $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
    	$this->middleware('auth');
    	$this->category = $category;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = $this->category->enum();
		$data = [
			'categories' => $categories
		];
		return view('admin.memberships.category.index',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.memberships.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CategoryRequest $request)
	{
		$data = $request->all();
		$category = $this->category->save($data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($category) {
			$sessionData['mensaje'] = 'La categoría ha sido creado Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'La categoría no pudo ser creada, intente nuevamente';
		}
		
		return redirect()->route('categories.edit',$category->id)->with($sessionData);
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = $this->category->find($id,false);
		if ($category) {
			return view('admin.memberships.category.show',['category'=>$category]);
		}

		$sessionData['tipo_mensaje'] = 'error';
		$sessionData['mensaje'] = 'La categoría no pudo ser encontrada';
		return redirect()->route('categories.index')->with($sessionData);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = $this->category->find($id);
		if ($category) {
			return view('admin.memberships.category.edit',['category'=>$category]);
		}

		$sessionData['tipo_mensaje'] = 'error';
		$sessionData['mensaje'] = 'La categoría no pudo ser encontrada';
		return redirect()->route('categories.index')->with($sessionData);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CategoryRequest $request, $id)
	{
		$data = $request->all();
		$category = $this->category->edit($id,$data);
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		if ($category) {
			$sessionData['mensaje'] = 'La categoría ha sido editada satisfacoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'La categoría no pudo ser actualizada, intente nuevamente';
		}
		return redirect()->route('categories.edit',$category->id)->with($sessionData);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$category = $this->category->remove($id);
		
		$sessionData = [
			'tipo_mensaje' => 'success',
			'mensaje' => '',
		];
		
		if ($category) {
			$sessionData['mensaje'] = 'La divsión fue Eliminada Satisfactoriamente';
		} else {
			$sessionData['tipo_mensaje'] = 'error';
			$sessionData['mensaje'] = 'La categoría no pudo ser eliminada, intente nuevamente';
		}
		return redirect()->route('categories.index')->with($sessionData);			
		
	}
}
