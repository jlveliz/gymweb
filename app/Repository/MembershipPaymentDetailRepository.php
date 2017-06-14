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
		$this->parent = $parent;
		return $this;
	}

	public function enum($params = null){
		$payments = MembershipPaymentDetail::where('membership_id',$this->parent)->orderBy('created_at','desc')->get();
		return $payments;
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

	public function totalPayToday()
	{
		$query = MembershipPaymentDetail::selectRaw('IFNULL(SUM(value),"0.00") as sum')->whereRaw('date_format(created_at,"%Y-%m-%d") = date_format(now(),"%Y-%m-%d")')->first();
		return $query->sum;
	}

}