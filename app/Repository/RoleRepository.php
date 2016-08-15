<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\RoleRepositoryInterface;
use GymWeb\Models\Role;
use Validator;

/**
* 
*/
class RoleRepository implements RoleRepositoryInterface
{


	public function enum($params = null)
	{
		$roles = Role::all();
		
		if ($roles) return $roles;
	}

	public function find($field, $returnException = true)
	{
		if (is_array($field)) {
			if (array_key_exists('name', $field)) { 
				$role = Role::where('name',$field['name'])->first();
			} 
		} elseif (is_string($field) || is_int($field)) {
		
			$role = Role::where('id',$field)->first();
		}

		
		if (!$role) return false;
	
		return $role;

	}

	//TODO
	public function save($data)
	{
		$role = new Role();
		$role->fill($data);
		if ($role->save()) {
			foreach ($data['permissions'] as $key => $permission) {
				$role->attachPermission($permission);
			}
			$key = $role->getKey();
			return  $this->find($key);
		} 
		return false;
		
	}

	public function edit($id,$data)
	{
		$role = $this->find($id);

		if ($role) {
			$role->fill($data);
			if($role->update()){
				$key = $role->getKey();
				return $this->find($key);
			}
		}

		return false;

	}

	public function remove($id)
	{
		if ($role = $this->find($id)) {
			$role->delete();
			return true;
		}
		return false;
	}

}