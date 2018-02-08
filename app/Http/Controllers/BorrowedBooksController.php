<?php

namespace Librory\Http\Controllers;

use Librory\Models\Borrow;
use Illuminate\Http\Request;

class BorrowedBooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librorian');
    }

    public function all()
    {
        $borrowedBooks = Borrow::latest()->paginate(15);

        return view('pages.borrows.all', compact(
            'borrowedBooks'
        ));
    }
}
