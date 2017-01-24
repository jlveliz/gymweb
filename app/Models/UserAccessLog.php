<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use Request;

class UserAccessLog extends Model
{
    
    /**
    * table
    */
    protected $table = "user_access_log";

    public $timestamp = true;

    public function __construct(){

        setlocale(LC_TIME, \Config('app.locale'));

    }

    public function user()
    {
        return $this->belongsTo('GymWeb\Models\User','user_id');
    }


    public static function add($user)
    {
        $accessLog = new static;
        $accessLog->user_id = $user;
        $accessLog->ip_address = Request::getClientIp();
        $accessLog->save();

        return $accessLog;

    }

}
