<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\MembershipPaymentDetailRepositoryInterface;
use GymWeb\Models\MembershipPaymentDetail;

/**
* 
*/
class MembershipPaymentDetailRepository implements MembershipPaymentDetailRepositoryInterface
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
		$membershipDetail = new MembershipPaymentDetail();
		$membershipDetail->fill($data);
		if ($membershipDetail->save()) {
			$key = $membershipDetail->getKey();
			return  $membershipDetail;
		} 
		return false;
		
	}

	public function edit($id,$data){

	}


	public function remove($id){
		
	}

}