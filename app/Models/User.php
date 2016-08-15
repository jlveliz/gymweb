<?php

namespace GymWeb\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    

    /**
     * table
     */
    protected $table = "user";

    public $timestamp = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
