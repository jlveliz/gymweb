<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\DivisionRepositoryInterface;
use GymWeb\Models\Division;

/**
* 
*/
class DivisionRepository implements DivisionRepositoryInterface
{


	public function enum($params = null)
	{
		$divisions = Division::all();
		
		if ($divisions) return $divisions;
	}

	public function find($field, $returnException = true)
	{
		if (is_array($field)) {
			if (array_key_exists('name', $field)) { 
				$division = Division::where('name','like','%'.$field['name'].'%')->first();
			}
		} elseif (is_string($field) || is_int($field)) {
		
			$division = Division::where('id',$field)->first();
		}

		
		if (!$division) return false;
	
		return $division;

	}

	//TODO
	public function save($data)
	{
		$division = new Division();
		$data['slug'] = str_slug($data['name'],'-');
		$division->fill($data);
		if ($division->save()) {
			$key = $division->getKey();
			return  $this->find($key);
		} 
		return false;
		
	}

	public function edit($id,$data)
	{
		$division = $this->find($id);

		if ($division) {
			$data['slug'] = str_slug($data['name'],'-');
			$division->fill($data);
			if($division->update()){
				$key = $division->getKey();
				return $this->find($key);
			}
		}

		return false;

	}

	public function remove($id)
	{
		if ($division = $this->find($id)) {
			$division->delete();
			return true;
		}
		return false;
	}

}