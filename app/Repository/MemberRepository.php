<?php
namespace GymWeb\Repository;

use GymWeb\RepositoryInterface\MemberRepositoryInterface;
use GymWeb\Models\Member;

/**
* 
*/
class MemberRepository implements MemberRepositoryInterface
{


	public function enum($params = null)
	{
		$members = Member::all();
		
		if ($members) return $members;
	}

	public function find($field, $returnException = true)
	{
		if (is_array($field)) {
			if (array_key_exists('idenitity_number', $field)) { 
				$member = Member::where('idenitity_number',$field['idenitity_number'])->first();
			}elseif (array_key_exists('email', $field)) { 
				$member = Member::where('email',$field['email'])->first();
			} elseif (array_key_exists('name', $field)) { 
				$member = Member::where('name','like','%'.$field['name'].'%')->first();
			} elseif (array_key_exists('last_name', $field)) { 
				$member = Member::where('last_name','like','%'.$field['last_name'].'%')->first();
			} 
		} elseif (is_string($field) || is_int($field)) {
		
			$member = Member::where('id',$field)->first();
		}

		
		if (!$member) return false;
	
		return $member;

	}

	//TODO
	public function save($data)
	{
		$member = new Member();
		$member->fill($data);
		if ($member->save()) {
			$key = $member->getKey();
			return  $this->find($key);
		} 
		return false;
		
	}

	public function edit($id,$data)
	{
		$member = $this->find($id);

		if ($member) {
			$member->fill($data);
			if($member->update()){
				$key = $member->getKey();
				return $this->find($key);
			}
		}

		return false;

	}

	public function remove($id)
	{
		if ($member = $this->find($id)) {
			$member->delete();
			return true;
		}
		return false;
	}


	private function pathUplod() {
		return public_path().'/uploads';
	}


	public function uploadPhoto($missId,$photo)
	{
		$arrayModel=[];
		if ($photo->isValid()) {
			
			$realPath = $photo->getRealPath();
			$image = Image::make($realPath);
			$isLandScape = true;

			if ($image->width() >= $image->height()) {
				$isLandScape = false;
			}
			//is landscape
			if ($isLandScape) {
				$image->resize(309,482,function($constraint){
					$constraint->aspectRatio();
				});
			} else {
				//is portrait
				$image->resize(722,482,function($constraint){
					$constraint->aspectRatio();
				});				
			}


			$imageName = $missId.'_'.str_random().'.'. $photo->getClientOriginalExtension();
			if($image->save($this->pathUplod().'/'.$imageName)){
				$arrayModel['path'] = 'public/uploads/'.$imageName;
				// $paths[$key]['miss_id'] = $keyMiss;
			}
		}

		if ($arrayModel) {
			$miss = $this->find($missId);
			$arrayModel['is_landscape'] = $isLandScape;
			$modelRelation = new \MissVote\Models\MissPhoto($arrayModel);
			$miss->photos()->save($modelRelation);
			return $miss;
		}
	}

}