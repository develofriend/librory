<?php

namespace Librory\Http\Controllers;

use Librory\Models\Author;
use Illuminate\Http\Request;
use Librory\Http\Requests\AddAuthorRequest;
use Librory\Http\Requests\EditAuthorRequest;

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
        return response()->json([
            'view' => view('pages.authors.edit', compact('author'))->render()
        ]);
    }

    public function update(EditAuthorRequest $request, Author $author)
    {
        $author->update($request->only(['name']));

        session()->flash('status', 'Successfully updated an author.');

        return response()->json([
            'done' => true
        ]);
    }
}
