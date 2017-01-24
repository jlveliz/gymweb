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
        //state 'caducado' or 'activo'
        if ($book->detail->secuence) {
            if ($book->detail->secuence == (new Book())->getMaxDaysDetail()) {
                $bookToUpdate = Book::find($book->detail->book_id);
                $bookToUpdate->book_state_phisical = (new Book())->getInactive();
                $bookToUpdate->save();
            }
        }

        //state 'impago', 'Abonado' or 'Pagado'
        if ($book->detail->value) {

            $sumPayments = (new Book())->getSumPayments($book->detail->book_id);
            if ($sumPayments < (new Book())->getPrice($book->detail->book_id)) {
                
                $bookToUpdate = Book::find($book->detail->book_id);
                $bookToUpdate->book_state_economic = (new Book())->stateEconomics['abonado'];
                $bookToUpdate->save();

            } else if($sumPayments == (new Book())->getPrice($book->detail->book_id)){
                
                $bookToUpdate = Book::find($book->detail->book_id);
                $bookToUpdate->book_state_economic = (new Book())->stateEconomics['pagado'];
                $bookToUpdate->save();

            } else {

                $bookToUpdate = Book::find($book->detail->book_id);
                $bookToUpdate->book_state_economic = (new Book())->stateEconomics['impago'];
                $bookToUpdate->save();

            }
        }


    }
}
