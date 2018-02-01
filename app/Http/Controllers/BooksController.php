<?php

namespace Librory\Http\Controllers;

use Librory\Models\Book;
use Illuminate\Http\Request;

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

    }

    public function save(Request $request)
    {

    }

    public function edit(Book $book)
    {

    }

    public function update(Request $request, Book $book)
    {

    }
}
