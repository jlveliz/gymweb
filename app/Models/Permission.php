<?php

namespace GymWeb\Models;

use Zizaco\Entrust\EntrustPermission;
use Carbon\Carbon;

class Permission extends EntrustPermission
{
    /**
     * table
     */
    protected $table = "permission";

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

    // public function getCreatedAtAttribute($value)
    // {
    //     $date = Carbon::parse($value);
    //     return $date->formatLocalized('%A %d %B %Y - %H:%M');
    // } 

    // public function getUpdatedAtAttribute($value)
    // {
    //     $date = Carbon::parse($value);
    //     return $date->formatLocalized('%A %d %B %Y - %H:%M');
    // }
}
