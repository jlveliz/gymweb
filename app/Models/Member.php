<?php

namespace GymWeb\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Carbon\Carbon;

class Member extends Authenticatable
{
    
    use EntrustUserTrait;

    /**
    * table
    */
    protected $table = "member";

    public $timestamp = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identity_number', 
        'name',
        'last_name',
        'email',
        'phone',
        'mobile',
        'weight',
        'height',
        'admission_date',
        'birth_date',
        'date_admission',
    ];

    public function __construct(){

        setlocale(LC_TIME, \Config('app.locale'));

    }

    public function currentDate()
    {
        $date = Carbon::now();
        return $date->toDateString();
    }

    // public function getAdmissionDateAttribute($value)
    // {
    //     $date = Carbon::parse($value);
    //     return $date->formatLocalized('%A %d %B %Y');
    // }

    public function memberships()
    {
        return $this->hasMany('GymWeb\Models\Membership','member_id');
    }

    public function disableMembershipsWithPeriodTo()
    {
        $date = new Carbon();
        foreach ($this->memberships as $key => $member) {
            if ($member->expiry_mode == 'period_to' && $member->period_to <=  $date->toDateString() && $member->membership_state_phisical == 1) {
                $member->membership_state_phisical = 0;
                $member->save();
            }
        }
    }

    public function current_membership()
    {
        $this->disableMembershipsWithPeriodTo();
        return $this->memberships()->where('membership_state_phisical',(new Membership())->getActive())->first();
    }

}
