<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\MemberAccessLogRepositoryInterface;
use GymWeb\Models\MemberAccessLog;

/**
* 
*/
class MemberAccessLogRepository implements MemberAccessLogRepositoryInterface
{


	public function enum($params = null)
	{
		$registers = MemberAccessLog::all();
		
		if (!$registers) {
			throw new UserException("No se han encontrado registros",404);
		}
		return $registers;
	}

	public function find($field, $returnException = true)
	{
		return false;

	}

	//TODO
	public function save($data)
	{
		return false;		
	}

	public function edit($id,$data)
	{
		return false;

	}

	public function remove($id)
	{
		return false;
	}

}