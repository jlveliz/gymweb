<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\PermissionRepositoryInterface;
use GymWeb\Models\Permission;
use Validator;

/**
* 
*/
class PermissionRepository implements PermissionRepositoryInterface
{


	public function enum($params = null)
	{
		$permissions = Permission::all();
		
		if ($permissions) return $permissions;
	}

	public function find($field, $returnException = true)
	{
		if (is_array($field)) {
			if (array_key_exists('name', $field)) { 
				$permission = Permission::where('name',$field['name'])->first();
			} 
		} elseif (is_string($field) || is_int($field)) {
		
			$permission = Permission::where('id',$field)->first();
		}

		
		if (!$permission) return false;
	
		return $permission;

	}

	//TODO
	public function save($data)
	{
		$permission = new Permission();
		$permission->fill($data);
		if ($permission->save()) {
			$key = $permission->getKey();
			return  $this->find($key);
		} 
		return false;
		
	}

	public function edit($id,$data)
	{
		$permission = $this->find($id);

		if ($permission) {
			$permission->fill($data);
			if($permission->update()){
				$key = $permission->getKey();
				return $this->find($key);
			}
		}

		return false;

	}

	public function remove($id)
	{
		if ($permission = $this->find($id)) {
			$permission->delete();
			return true;
		}
		return false;
	}

}