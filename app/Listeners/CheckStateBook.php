<?php

namespace GymWeb\Listeners;

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
    public function handle(\GymWeb\Events\CheckStateBook $book)
    {
        if ($book->detail->secuence == (new Book())->getMaxDaysDetail()) {
            $bookToUpdate = Book::find($book->detail->book_id);
            $bookToUpdate->book_state_phisical = (new Book())->getInactive();
            $bookToUpdate->save();
        }
    }
}
