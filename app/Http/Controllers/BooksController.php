<?php

namespace Librory\Http\Controllers;

use Librory\Models\Book;
use Illuminate\Http\Request;
use Librory\Models\Publisher;
use Librory\Http\Requests\AddBookRequest;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librorian');
    }

    public function all()
    {
        $books = Book::orderByTitle();

        return view('pages.books.all', compact('books'));
    }

    public function add()
    {
        $publishers = Publisher::orderByName();

        return view('pages.books.add', compact(
            'publishers'
        ));
    }

    public function save(AddBookRequest $request)
    {
        $book = Book::create($request->only([
            'title', 'isbn', 'publisher_id', 'edition', 'volume', 'issue'
        ]));

        return redirect()->route('books.all')
            ->withStatus('Successfully created a new book.');
    }

    public function edit(Book $book)
    {

    }

    public function update(Request $request, Book $book)
    {

    }
}
