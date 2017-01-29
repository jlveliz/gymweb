<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\MembershipRepositoryInterface;
use GymWeb\Models\Membership;
use GymWeb\Events\CheckStateMembership;
use Event;

/**
* 
*/
class MembershipRepository implements MembershipRepositoryInterface
{

	protected $parent;


	public function setParent($parent)
	{
		$this->parent = $parent;
		return $this;
	}

	public function enum($params = null)
	{
		$memberships = Membership::where('client_id',$this->parent)->get();
		if ($memberships) return $memberships;
	}

	public function find($field, $returnException = true)
	{
		$membership = Membership::where('id',$field)->first();
		if (!$membership) return false;
		return $membership;

	}

	//TODO
	public function save($data)
	{
		$membership = new Membership();
		$membership->fill($data);
		if ($membership->save()) {
			$key = $membership->getKey();
			if ($membership->membership_state_economic > 1) { //if membership is 'abonado' or 'cancelado' insert a payment detail
				$paymentDetail = new \GymWeb\Models\MembershipPaymentDetail();
				$paymentDetail->membership_id = $key;
				$paymentDetail->value = $data['payment_value'];
				$paymentDetail->save();
				Event::fire(new CheckStateMembership($paymentDetail));
			}
			return  $this->find($key);
		} 
		return false;
		
	}

	public function edit($id,$data)
	{
		$membership = $this->find($id);

		if ($membership) {
			$membership->fill($data);
			if($membership->update()){
				$key = $membership->getKey();
				return $this->find($key);
			}
		}

		return false;

	}

	public function remove($id)
	{
		if ($membership = $this->find($id)) {
			$membership->delete();
			return true;
		}
		return false;
	}

}