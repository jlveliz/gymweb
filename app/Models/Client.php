<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Client extends Model
{
    /**
    * table
    */
    protected $table = "client";

    public $timestamp = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identity_number', 
        'name',
        'last_name',
        'email',
        'phone',
        'mobile',
        'weight',
        'height',
        'admission_date',
        'birth_date',
        'date_admission',
        'user_id_created',
    ];

    public function __construct(){

        setlocale(LC_TIME, \Config('app.locale'));

    }

    public function currentDate()
    {
        $date = Carbon::now();
        return $date->formatLocalized('%A %d %B %Y');
    }

    public function getAdmissionDateAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y');
    }

    public function books()
    {
        return $this->hasMany('GymWeb\Models\Book','client_id');
    }

    public function current_book()
    {
        return $this->books()->where('book_state_phisical',(new Book())->getActive())->first();
    }

}
