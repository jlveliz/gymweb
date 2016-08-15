<?php

namespace GymWeb\Models;

use Zizaco\Entrust\EntrustRole;
use Carbon\Carbon;

class Role extends EntrustRole
{
    /**
     * table
     */
    protected $table = "role";

    public $timestamp = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    public function __construct(){

        setlocale(LC_TIME, \Config('app.lang'));

    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y - %H:%M');
    } 

    public function getUpdatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y - %H:%M');
    }
}
