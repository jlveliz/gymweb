<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\CategoryRepositoryInterface;
use GymWeb\Models\Category;

/**
* 
*/
class CategoryRepository implements CategoryRepositoryInterface
{


	public function enum($params = null)
	{
		$categories = Category::all();
		
		if ($categories) return $categories;
	}

	public function find($field, $returnException = true)
	{
		if (is_array($field)) {
			if (array_key_exists('name', $field)) { 
				$category = Category::where('name','like','%'.$field['name'].'%')->first();
			}
		} elseif (is_string($field) || is_int($field)) {
		
			$category = Category::where('id',$field)->first();
		}

		
		if (!$category) return false;
	
		return $category;

	}

	//TODO
	public function save($data)
	{
		$category = new Category();
		$data['slug'] = str_slug($data['name'],'-');
		$category->fill($data);
		if ($category->save()) {
			$key = $category->getKey();
			return  $this->find($key);
		} 
		return false;
		
	}

	public function edit($id,$data)
	{
		$category = $this->find($id);

		if ($category) {
			$data['slug'] = str_slug($data['name'],'-');
			$category->fill($data);
			if($category->update()){
				$key = $category->getKey();
				return $this->find($key);
			}
		}

		return false;

	}

	public function remove($id)
	{
		if ($category = $this->find($id)) {
			$category->delete();
			return true;
		}
		return false;
	}

}