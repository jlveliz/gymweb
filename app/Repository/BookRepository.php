<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\BookRepositoryInterface;
use GymWeb\Models\Book;

/**
* 
*/
class BookRepository implements BookRepositoryInterface
{

	protected $parent;


	public function setParent($parent)
	{
		$this->parent = $parent;
		return $this;
	}

	public function enum($params = null)
	{
		$books = Book::where('client_id',$this->parent)->get();
		if ($books) return $books;
	}

	public function find($field, $returnException = true)
	{
		$book = Book::where('id',$field)->first();
		if (!$book) return false;
		return $book;

	}

	//TODO
	public function save($data)
	{
		$book = new Book();
		$book->fill($data);
		if ($book->save()) {
			$key = $book->getKey();
			return  $this->find($key);
		} 
		return false;
		
	}

	public function edit($id,$data)
	{
		$book = $this->find($id);

		if ($book) {
			$book->fill($data);
			if($book->update()){
				$key = $book->getKey();
				return $this->find($key);
			}
		}

		return false;

	}

	public function remove($id)
	{
		if ($book = $this->find($id)) {
			$book->delete();
			return true;
		}
		return false;
	}

}