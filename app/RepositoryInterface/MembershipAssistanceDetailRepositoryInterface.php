<?php
namespace  GymWeb\RepositoryInterface;

use GymWeb\RepositoryInterface\NestedRepositoryInterface;


/**
* Autor: 
* Jorge Luis Veliz
* Descripcion:
* Interface del cual todos los repositorios deben basarse
*/
interface MembershipAssistanceDetailRepositoryInterface extends NestedRepositoryInterface
{
	public function totalAssistanceToday();

	public function totalCurrentMonth();

	public function reportCountAssistances($params);
}