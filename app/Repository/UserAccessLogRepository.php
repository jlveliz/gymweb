<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\UserAccessLogRepositoryInterface;
use GymWeb\Models\UserAccessLog;

/**
* 
*/
class UserAccessLogRepository implements UserAccessLogRepositoryInterface
{


	public function enum($params = null)
	{
		$registers = UserAccessLog::all();
		
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