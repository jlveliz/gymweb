<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\MembershipTypeRepositoryInterface;
use GymWeb\Models\MembershipType;

/**
* 
*/
class MembershipTypeRepository implements MembershipTypeRepositoryInterface
{


	public function enum($params = null)
	{
		$membershipTypes = MembershipType::all();
		
		if ($membershipTypes) return $membershipTypes;
	}

	public function find($field, $returnException = true)
	{
		if (is_array($field)) {
			if (array_key_exists('name', $field)) { 
				$membershipType = MembershipType::where('name','like','%'.$field['name'].'%')->first();
			}
		} elseif (is_string($field) || is_int($field)) {
		
			$membershipType = MembershipType::where('id',$field)->first();
		}

		
		if (!$membershipType) return false;
	
		return $membershipType;

	}

	//TODO
	public function save($data)
	{
		$membershipType = new MembershipType();
		$membershipType->fill($data);
		if ($membershipType->save()) {
			$key = $membershipType->getKey();
			return  $this->find($key);
		} 
		return false;
		
	}

	public function edit($id,$data)
	{
		$membershipType = $this->find($id);

		if ($membershipType) {
			$membershipType->fill($data);
			if($membershipType->update()){
				$key = $membershipType->getKey();
				return $this->find($key);
			}
		}

		return false;

	}

	public function remove($id)
	{
		if ($membershipType = $this->find($id)) {
			$membershipType->delete();
			return true;
		}
		return false;
	}

}