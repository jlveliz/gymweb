<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class MembershipType extends Model
{
   

    /**
    * table
    */
    protected $table = "membership_type";

    public $timestamp = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 
        'name', 
        'description',
        'length_time_number',
        'length_time_mod',
        'price'
    ];

    public function __construct(){

        setlocale(LC_TIME, \Config('app.locale'));

    }

    // public function getCreatedAtAttribute($value)
    // {
    //     $date = Carbon::parse($value);
    //     return $date->formatLocalized('%A %d %B %Y');
    // }

    public function memberships()
    {
        return $this->hasMany('GymWeb\Models\Membership','membership_type_id');
    }

    public function category()
    {
        return $this->belongsTo('GymWeb\Models\Category','category_id');
    }

}
