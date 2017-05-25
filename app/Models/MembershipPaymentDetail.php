<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class MembershipPaymentDetail extends Model
{
    
    /**
    * table
    */
    protected $table = "membership_payment_detail";

    public $timestamp = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'membership_id', 
        'value',
    ];

    public function __construct(){

        setlocale(LC_TIME, \Config('app.lang'));

    }

    // public function getCreatedAtAttribute($value)
    // {
    //     $date = Carbon::parse($value);
    //     return $date->formatLocalized('%A %d %B %Y');
    // }

    public function membership()
    {
        return $this->blongsTo('GymWeb\Models\Membership','membership_id');
    }

}
