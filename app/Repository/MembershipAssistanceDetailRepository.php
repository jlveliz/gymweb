<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\MembershipAssistanceDetailRepositoryInterface;
use GymWeb\Models\MembershipAssistanceDetail;

/**
* 
*/
class MembershipAssistanceDetailRepository implements MembershipAssistanceDetailRepositoryInterface
{

	protected $parent;

	public function setParent($parent){
		$this->parent = $parent;
		return $this;
	}

	public function enum($params = null){
		$assistances = MembershipAssistanceDetail::where('membership_id',$this->parent)->orderBy('date_job','desc')->get();
		return $assistances;
	}

	public function find($field, $returnException = true){

	}

	//TODO
	public function save($data)
	{
		$detail = new MembershipAssistanceDetail();
		$detail->fill($data);
		if ($detail->save()) {
			$key = $detail->getKey();
			return  $detail;
		} 
		return false;
		
	}

	public function edit($id,$data){

	}


	public function remove($id){
		
	}

}