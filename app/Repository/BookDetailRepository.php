<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\BookDetailRepositoryInterface;
use GymWeb\Models\BookDetail;

/**
* 
*/
class BookDetailRepository implements BookDetailRepositoryInterface
{

	protected $parent;

	public function setParent($parent);

	public function enum($params = null);

	public function find($field, $returnException = true);

	//TODO
	public function save($data)
	{
		$book = new BookDetail();
		$book->fill($data);
		if ($book->save()) {
			$key = $book->getKey();
			return  $this->find($key);
		} 
		return false;
		
	}

	public function edit($id,$data);


	public function remove($id);

}