<?php

namespace Librory\Http\Controllers;

use Librory\Models\Author;
use Illuminate\Http\Request;
use Librory\Http\Requests\AddAuthorRequest;

class AuthorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librorian');
    }

    public function all()
    {
        $authors = Author::orderByName();

        return view('pages.authors.all', compact(
            'authors'
        ));
    }

    public function add()
    {
        return response()->json([
            'view' => view('pages.authors.add')->render()
        ]);
    }

    public function save(AddAuthorRequest $request)
    {
        $author = Author::create($request->only(['name']));

        session()->flash('status', 'Successfully created a new author');

        return response()->json([
            'done' => true
        ]);
    }

    public function edit(Author $author)
    {

    }

    public function update(Request $request, Author $author)
    {

    }
}
