<?php

namespace Librory\Http\Controllers;

use Librory\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librorian');
    }

    public function all()
    {

    }

    public function add()
    {

    }

    public function save(Request $request)
    {

    }

    public function edit(Author $author)
    {

    }

    public function update(Request $request, Author $author)
    {

    }
}
