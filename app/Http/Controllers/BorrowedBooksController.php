<?php

namespace Librory\Http\Controllers;

use Librory\Models\Book;
use Librory\Models\User;
use Librory\Models\Borrow;
use Illuminate\Http\Request;
use Librory\Http\Requests\NewBorrowRequest;

class BorrowedBooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librorian');
    }

    public function all()
    {
        $borrowedBooks = Borrow::withCount('books')
            ->latest()
            ->paginate(15);

        return view('pages.borrows.all', compact(
            'borrowedBooks'
        ));
    }

    public function new(User $user)
    {
        if (! $user->id) {
            $members = User::members(true)
                ->orderBy('last_name')
                ->get();

            return view('pages.borrows.select-member', compact(
                'members'
            ));
        }

        return view('pages.borrows.new', compact(
            'user'
        ));
    }

    public function save(NewBorrowRequest $request, User $user)
    {
        $borrowedBook = Borrow::create([
            'user_id' => $user->id,
            'librorian_id' => auth()->id(),
            'return_date' => $request->return_date
        ]);

        $borrowedBook->linkBooks($request->books);

        return redirect()->route('borrow.all')
            ->withStatus('Success!');
    }

    public function fetchBooks()
    {
        $books = Book::orderByTitle();
        $books->load('authors', 'counts');

        return response()->json([
            'count' => count($books),
            'list' => view('pages.borrows.books-list', compact(
                'books'
            ))->render()
        ]);
    }
}
