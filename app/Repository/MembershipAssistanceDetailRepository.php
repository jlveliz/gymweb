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

	public function totalAssistanceToday()
	{
		$query = MembershipAssistanceDetail::selectRaw('IFNULL(count(length_secuence_day),"0") as count')->whereRaw('date_job = date_format(now(),"%Y-%m-%d")')->first();
		return $query->count;
	}

	public function totalCurrentMonth()
	{
		$query = MembershipAssistanceDetail::selectRaw('date_job, count(date_job) as counter')->whereRaw('DATE_FORMAT(date_job, "%m") = DATE_FORMAT(now(), "%m")')->groupBy('date_job')->orderBy('date_job')->get();

		$arrayFormated = [];
		foreach ($query as $key => $value) {
			$arrayFormated['dates'][] = $value->date_job;
			$arrayFormated['counters'][] = $value->counter;
		}
		
		return $arrayFormated;
	}

}