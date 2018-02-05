<?php

namespace Librory\Http\Controllers;

use Librory\Models\Book;
use Librory\Models\Author;
use Illuminate\Http\Request;
use Librory\Models\Category;
use Librory\Models\Publisher;
use Librory\Http\Requests\AddBookRequest;
use Librory\Http\Requests\EditBookRequest;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librorian');
    }

    public function all()
    {
        $books = Book::orderByTitle(true)
            ->paginate(15);

        $books->load('publisher', 'authors', 'counts');

        return view('pages.books.all', compact('books'));
    }

    public function add()
    {
        $publishers = Publisher::orderByName();
        $categories = Category::orderByName();

        return view('pages.books.add', compact(
            'publishers',
            'categories'
        ));
    }

    public function save(AddBookRequest $request)
    {
        $book = Book::create($request->only([
            'title', 'isbn', 'publisher_id', 'edition', 'volume', 'issue'
        ]));

        $book->linkCategories($request->categories);
        $book->linkAuthors($request->authors);
        $book->recordQuantity($request->quantity);

        return redirect()->route('books.all')
            ->withStatus('Successfully created a new book.');
    }

    public function edit(Book $book)
    {
        $book->load('bookCategories', 'bookAuthors', 'bookAuthors.author');

        $publishers = Publisher::orderByName();
        $categories = Category::orderByName();

        return view('pages.books.edit', compact(
            'publishers',
            'categories',
            'book'
        ));
    }

    public function update(EditBookRequest $request, Book $book)
    {
        $book->update($request->only([
            'title', 'isbn', 'publisher_id', 'edition', 'volume', 'issue'
        ]));

        $book->linkCategories($request->categories);
        $book->linkAuthors($request->authors);

        return redirect()->route('books.all')
            ->withStatus('Successfully updated book info.');
    }
}
