<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use Request;

class MemberAccessLog extends Model
{
    
    /**
    * table
    */
    protected $table = "member_access_log";

    public $timestamp = true;

    public function __construct(){

        setlocale(LC_TIME, \Config('app.locale'));

    }

    public function user()
    {
        return $this->belongsTo('GymWeb\Models\Member','member_id');
    }


    public static function add($member)
    {
        $accessLog = new static;
        $accessLog->member_id = $member;
        $accessLog->ip_address = Request::getClientIp();
        $accessLog->save();

        return $accessLog;

    }

}
