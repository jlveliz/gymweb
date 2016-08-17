<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\ClientRepositoryInterface;
use GymWeb\Models\Client;

/**
* 
*/
class ClientRepository implements ClientRepositoryInterface
{


	public function enum($params = null)
	{
		$clients = Client::all();
		
		if ($clients) return $clients;
	}

	public function find($field, $returnException = true)
	{
		if (is_array($field)) {
			if (array_key_exists('idenitity_number', $field)) { 
				$client = Client::where('idenitity_number',$field['idenitity_number'])->first();
			}elseif (array_key_exists('email', $field)) { 
				$client = Client::where('email',$field['email'])->first();
			} elseif (array_key_exists('name', $field)) { 
				$client = Client::where('name','like','%'.$field['name'].'%')->first();
			} elseif (array_key_exists('last_name', $field)) { 
				$client = Client::where('last_name','like','%'.$field['last_name'].'%')->first();
			} 
		} elseif (is_string($field) || is_int($field)) {
		
			$client = Client::where('id',$field)->first();
		}

		
		if (!$client) return false;
	
		return $client;

	}

	//TODO
	public function save($data)
	{
		$data['user_id_created'] = \Auth::user()->id;
		$client = new Client();
		$client->fill($data);
		if ($client->save()) {
			$key = $client->getKey();
			return  $this->find($key);
		} 
		return false;
		
	}

	public function edit($id,$data)
	{
		$client = $this->find($id);

		if ($client) {
			$client->fill($data);
			if($client->update()){
				$key = $client->getKey();
				return $this->find($key);
			}
		}

		return false;

	}

	public function remove($id)
	{
		if ($client = $this->find($id)) {
			$client->delete();
			return true;
		}
		return false;
	}

}