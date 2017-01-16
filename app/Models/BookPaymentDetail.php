<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class BookPaymentDetail extends Model
{
    
    /**
    * table
    */
    protected $table = "book_payment_detail";

    public $timestamp = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id', 
        'value',
    ];

    public function __construct(){

        setlocale(LC_TIME, \Config('app.lang'));

    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y');
    }

    public function book()
    {
        return $this->blongsTo('GymWeb\Models\Book','book_id');
    }

}