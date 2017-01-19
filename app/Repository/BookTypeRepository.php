<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\BookTypeRepositoryInterface;
use GymWeb\Models\BookType;

/**
* 
*/
class BookTypeRepository implements BookTypeRepositoryInterface
{


	public function enum($params = null)
	{
		$bookTypes = BookType::all();
		
		if ($bookTypes) return $bookTypes;
	}

	public function find($field, $returnException = true)
	{
		if (is_array($field)) {
			if (array_key_exists('name', $field)) { 
				$bookType = BookType::where('name','like','%'.$field['name'].'%')->first();
			}
		} elseif (is_string($field) || is_int($field)) {
		
			$bookType = BookType::where('id',$field)->first();
		}

		
		if (!$bookType) return false;
	
		return $bookType;

	}

	//TODO
	public function save($data)
	{
		$bookType = new BookType();
		$bookType->fill($data);
		if ($bookType->save()) {
			$key = $bookType->getKey();
			return  $this->find($key);
		} 
		return false;
		
	}

	public function edit($id,$data)
	{
		$bookType = $this->find($id);

		if ($bookType) {
			$bookType->fill($data);
			if($bookType->update()){
				$key = $bookType->getKey();
				return $this->find($key);
			}
		}

		return false;

	}

	public function remove($id)
	{
		if ($bookType = $this->find($id)) {
			$bookType->delete();
			return true;
		}
		return false;
	}

}