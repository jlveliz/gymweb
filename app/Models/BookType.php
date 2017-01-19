<?php

namespace GymWeb\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class BookType extends Model
{
    
    use SoftDeletes;

    /**
    * table
    */
    protected $table = "book_type";

    public $timestamp = true;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'description',
        'price'
    ];

    public function __construct(){

        setlocale(LC_TIME, \Config('app.locale'));

    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->formatLocalized('%A %d %B %Y');
    }

    public function books()
    {
        return $this->hasMany('GymWeb\Models\Book','book_type_id');
    }

}
