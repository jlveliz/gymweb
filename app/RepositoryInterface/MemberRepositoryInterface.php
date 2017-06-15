<?php
namespace  GymWeb\RepositoryInterface;

use GymWeb\RepositoryInterface\CoreRepositoryInterface;

/**
* Autor: 
* Jorge Luis Veliz
* Descripcion:
* Interface del cual todos los repositorios deben basarse
*/
interface MemberRepositoryInterface extends CoreRepositoryInterface
{
	public function uploadPhoto($memberId,$photo);

	public function recentMemberMonth();
	
}