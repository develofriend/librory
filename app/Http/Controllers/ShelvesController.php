<?php

namespace Librory\Http\Controllers;

use Librory\Models\Shelf;
use Illuminate\Http\Request;

class ShelvesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librory');
    }

    public function all()
    {
        $shelves = Shelf::all();

        return view('pages.shelves.all', compact(
            'shelves'
        ));
    }

    public function add()
    {

    }

    public function save(Request $request)
    {

    }

    public function edit(Shelf $shelf)
    {

    }

    public function update(Request $request, Shelf $shelf)
    {

    }
}
