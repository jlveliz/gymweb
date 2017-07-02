<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Category extends Model
{
   

    /**
    * table
    */
    protected $table = "category";

    public $timestamp = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'description',
        'slug'
    ];

    public function __construct(){

        setlocale(LC_TIME, \Config('app.locale'));

    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y');
    }

    public function memberships()
    {
        return $this->hasMany('GymWeb\Models\Membership','membership_type_id');
    }

}
