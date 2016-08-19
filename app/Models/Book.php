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

        setlocale(LC_TIME, \Config('app.lang'));

    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y');
    }

    public function client()
    {
        return $this->blongsTo('GymWeb\Models\Client','client_id');
    }

    public function getActive()
    {
        return $this->active;
    }

}