<?php

namespace GymWeb\Http\Middleware;

use Closure;

use GymWeb\Models\Book;

class PayMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $bookId = $request->route()->getParameter('books');
        $clientId = $request->route()->getParameter('clients');
        if (!$bookId) return redirect()->route('clients.show',$clientId);
        $book = Book::find($bookId);
        if (!$book || ($book->book_state_economic == (new Book())->stateEconomics['pagado'])) {
            return redirect()->route('clients.show',$clientId);
        }
        return $next($request);
    }
}
