<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\MembershipDetailRepositoryInterface;
use GymWeb\Models\MembershipDetail;

/**
* 
*/
class MembershipDetailRepository implements MembershipDetailRepositoryInterface
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
		$bookDetail = new MembershipDetail();
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