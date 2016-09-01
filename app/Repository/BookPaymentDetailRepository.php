<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\BookPaymentDetailRepositoryInterface;
use GymWeb\Models\BookPaymentDetail;

/**
* 
*/
class BookPaymentDetailRepository implements BookPaymentDetailRepositoryInterface
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
		$bookDetail = new BookPaymentDetail();
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