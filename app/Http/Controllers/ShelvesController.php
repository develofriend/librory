<?php

namespace Librory\Http\Controllers;

use Librory\Models\Shelf;
use Illuminate\Http\Request;

class ShelvesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librorian');
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
        return response()->json([
            'view' => view('pages.shelves.add')->render()
        ]);
    }

    public function save(Request $request)
    {
        $shelf = Shelf::create($request->only(['name']));

        session()->flash('status', 'Successfully created a new shelf');

        return response()->json([
            'done' => true
        ]);
    }

    public function edit(Shelf $shelf)
    {
        return response()->json([
            'view' => view('pages.shelves.edit', compact('shelf'))->render()
        ]);
    }

    public function update(Request $request, Shelf $shelf)
    {
        $shelf->update($request->only(['name']));

        session()->flash('status', 'Successfully updated shelf info');

        return response()->json([
            'done' => true
        ]);
    }
}
