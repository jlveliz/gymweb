<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Client extends Model
{
    /**
    * table
    */
    protected $table = "client";

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
        'user_id_created',
    ];

    public function __construct(){

        setlocale(LC_TIME, \Config('app.locale'));

    }

    public function currentDate()
    {
        $date = Carbon::now();
        return $date->formatLocalized('%A %d %B %Y');
    }

    public function getAdmissionDateAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y');
    }

    public function memberships()
    {
        return $this->hasMany('GymWeb\Models\Membership','client_id');
    }

    public function current_membership()
    {
        // return $this->memberships()->where('membership_state_phisical',(new Membership())->getActive())->first();
        $dt = Carbon::now();
        $current = null;
        foreach ($this->memberships as $key => $membership) {

            if ($membership->expiry_mode == 'period_to' && ($membership->period_to <= $dt->toDateString() )) {
                $membership->membership_state_phisical = $membership->getInactive();
                $membership->save();
            } else {
                $current = $membership;
            }
        }

        return $current;

    }

}
