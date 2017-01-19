<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Book extends Model
{
    
    use SoftDeletes;

    private $active = 1;

    private $inactive = 0;

    private $maxDaysDetail = 25;
    
    private $price = 25.00;

    public $stateEconomics = [
        'impago' => 1,
        'abonado'=>2,
        'pagado'=>3
    ];

    /**
    * table
    */
    protected $table = "book";

    public $timestamp = true;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 
        'period_from',
        'period_to',
        'book_state_phisical',
        'book_state_economic',
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
        return $this->belongsTo('GymWeb\Models\BookType','book_type_id');
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

    public function getPrice()
    {
        return $this->price;
    }

    public function getSumPayments($bookId)
    {
        $sum = $this->where('id',$bookId)->first()->paymentsDetail()->sum('value');
        if(!$sum) return '00.00';
        return $sum;
    }

    public function daysDetail()
    {
        return $this->hasMany('GymWeb\Models\BookDetail','book_id');
    }

    public function paymentsDetail()
    {
        return $this->hasMany('GymWeb\Models\BookPaymentDetail','book_id');
    }

    public function getNextSecuence()
    {
        $dDetails = $this->daysDetail()->orderBy('secuence','desc')->first();
        if (!$dDetails) return 1;
        return $dDetails->secuence + 1;
    }

}
