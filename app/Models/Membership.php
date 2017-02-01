<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Membership extends Model
{
    
    use SoftDeletes;

    private $active = 1;

    private $inactive = 0;
    
    public $stateEconomics = [
        'impago' => 1,
        'abonado'=>2,
        'pagado'=>3
    ];

    /**
    * table
    */
    protected $table = "membership";

    public $timestamp = true;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 
        'membership_type_id',
        'price', 
        'period_from',
        'period_to',
        'expiry_mode',
        'max_day_job',
        'membership_state_phisical',
        'membership_state_economic',
    ];

    public function __construct(){

        setlocale(LC_TIME, \Config('app.locale'));

    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y');
    }

    public function getPeriodFromAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y');
    }
    
    public function getPeriodToAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y');
    }

    public function client()
    {
        return $this->belongsTo('GymWeb\Models\Client','client_id');
    } 

    public function type()
    {
        return $this->belongsTo('GymWeb\Models\MembershipType','membership_type_id');
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getInactive()
    {
        return $this->inactive;
    }

    public function getMaxDaysDetail()
    {
        return \Config('book.max-days-detail');
    }

    public function getSumPayments()
    {
        $sum = $this->paymentsDetail()->sum('value');
        if(!$sum) return '00.00';
        return $sum;
    }

    public function assistances()
    {
        return $this->hasMany('GymWeb\Models\MembershipAssistanceDetail','membership_id');
    }

    public function paymentsDetail()
    {
        return $this->hasMany('GymWeb\Models\MembershipPaymentDetail','membership_id');
    }

    public function getNextSecuence()
    {
        $dDetails = $this->assistances()->orderBy('length_secuence_day','desc')->first();
        if (!$dDetails) return 1;
        return $dDetails->length_secuence_day + 1;
    }

}
