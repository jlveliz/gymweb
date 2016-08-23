<?php

namespace GymWeb\RepositoryInterface;

/**
* Autor: 
* Jorge Luis Veliz
* Descripcion:
* Interface del cual todos los repositorios deben basarse
*/
interface NestedRepositoryInterface extends CoreRepositoryInterface
{
	
	public function setParent($parent);

}