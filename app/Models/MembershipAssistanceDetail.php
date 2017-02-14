<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class MembershipAssistanceDetail extends Model
{
    
    /**
    * table
    */
    protected $table = "membership_assistance_detail";

    public $timestamp = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'membership_id', 
        'length_secuence_day',
        'date_job',
    ];

    public function __construct(){
        setlocale(LC_TIME, \Config('app.locale'));
    }

    public function getDateJobAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y');
    }

    public function membership()
    {
        return $this->blongsTo('GymWeb\Models\Membership','membership_id');
    }

}
