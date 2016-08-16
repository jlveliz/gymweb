<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\UserRepositoryInterface;
use GymWeb\Models\User;
use GymWeb\Exceptions\UserException;
use Validator;

/**
* 
*/
class UserRepository implements UserRepositoryInterface
{


	public function enum($params = null)
	{
		$users = User::all();
		
		if (!$users) {
			throw new UserException("No se han encontrado usuarios",404);
		}
		return $users;
	}

	public function find($field, $returnException = true)
	{
		if (is_array($field)) {
			if (array_key_exists('username', $field)) { 
				$user = User::where('username',$field['username'])->first();
			} else {
				throw new UserException("No se puede buscar al user",500);		
			}
		} elseif (is_string($field) || is_int($field)) {
		
			$user = User::where('id',$field)->first();
		}

		if ($returnException) {
			if (!$user) throw new UserException("No se ha encontrado el user solicitado",404);
		} else {
			if (!$user) return false;
		}
		
		return $user;

	}

	//TODO
	public function save($data)
	{
		$user = new User();

		$data['password'] = \Hash::make($data['password']);

		$user->fill($data);
		if ($user->save()) {
			$user->roles()->sync($data['roles']);
			$key = $user->getKey();
			return  $this->find($key);
		} 
		throw new UserException("Ha ocurrido un error al guardar el usuario",500);
		
	}

	public function edit($id,$data)
	{
		$user = $this->find($id);

		if ($user) {
			// dd($data);
			$user->username = $data['username'];
			if(!empty($data['password'])) {
				// dd($data['password']);
				$data['password'] = \Hash::make($data['password']);
				$user->password = $data['password']; 
   			}
			if($user->update()){
				$user->roles()->sync($data['roles']);
				$key = $user->getKey();
				return $this->find($key);
			}
		}

		throw new UserException("Ha ocurrido un error al actualizar el usuario",500);

	}

	public function remove($id)
	{
		if ($user = $this->find($id)) {
			$user->delete();
			return true;
		}
		throw new UserException("Ha ocurrido un error al eliminar el user",500);
	}

}