<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\BookDetailRepositoryInterface;
use GymWeb\Models\BookDetail;

/**
* 
*/
class BookDetailRepository implements BookDetailRepositoryInterface
{

	protected $parent;

	public function setParent($parent){

	}

	public function enum($params = null){

	}

	public function find($field, $returnException = true){

	}

	//TODO
	public function save($data)
	{
		$bookDetail = new BookDetail();
		$bookDetail->fill($data);
		if ($bookDetail->save()) {
			$key = $bookDetail->getKey();
			return  $bookDetail;
		} 
		return false;
		
	}

	public function edit($id,$data){

	}


	public function remove($id){
		
	}

}