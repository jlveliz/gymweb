<?php

namespace GymWeb\Listeners;

use GymWeb\Events\CheckStateBook;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GymWeb\Models\Book;

class CheckStateBook
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckStateBook  $event
     * @return void
     */
    public function handle(CheckStateBook $book)
    {
        dd($this->book);
        if ($this->book->secuence == (new Book())->getMaxDaysSecuence()) {
            
        }
    }
}
