<?php

namespace GymWeb\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;

use GymWeb\Models\Book;

class ExtendValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('exist_book_active',function($attribute, $value, $parameters, $validator){
            $existBookActive = Book::where($attribute,$value)
                               ->where('book_state_phisical',(new Book())->getActive())
                               ->first();
            if ($existBookActive) return false;
            return true;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
