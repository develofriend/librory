<?php

namespace Librory\Http\Controllers;

use Librory\Models\Book;
use Librory\Models\Author;
use Illuminate\Http\Request;
use Librory\Models\Category;
use Librory\Models\Publisher;
use Librory\Http\Requests\AddBookRequest;
use Librory\Http\Requests\EditBookRequest;
use Librory\Http\Requests\AddBookCountRequest;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librorian');
    }

    public function all()
    {
        $books = Book::select('books.*')->orderByTitle(true);

        if (request()->has('author') and ! is_null(request()->author)) {
            $books = $books->leftJoin('book_authors', 'books.id', '=', 'book_authors.book_id')
                ->where('book_authors.author_id', request()->author);
        }

        if (request()->has('category') and ! is_null(request()->category)) {
            $books = $books->leftJoin('book_categories', 'books.id', '=', 'book_categories.book_id')
                ->where('book_categories.category_id', request()->category);
        }

        if (request()->has('publisher') and ! is_null(request()->publisher)) {
            $books = $books->where('books.publisher_id', request()->publisher);
        }

        $books = $books->paginate(15);
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

    public function addCountForm(Book $book)
    {
        return response()->json([
            'view' => view('pages.books.add-count', compact('book'))->render()
        ]);
    }

    public function addCount(AddBookCountRequest $request, Book $book)
    {
        $book->recordQuantity($request->quantity);

        session()->flash('status', 'Successfully added quantity for ' . $book->title . '.');

        return response()->json([
            'done' => true
        ]);
    }
}
