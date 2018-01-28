<?php

namespace Librory\Http\Controllers;

use Illuminate\Http\Request;
use Librory\Models\Publisher;
use Librory\Http\Requests\AddPublisherRequest;

class PublishersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librorian');
    }

    public function all()
    {
        $publishers = Publisher::all();

        return view('pages.publishers.all', compact(
            'publishers'
        ));
    }

    public function add()
    {
        return view('pages.publishers.add');
    }

    public function save(AddPublisherRequest $request)
    {
        $publisher = Publisher::create($request->only([
            'name',
            'email',
            'contact_number',
            'address'
        ]));

        return redirect()->route('publishers.all')
            ->withStatus('Successfully create a new publisher.');
    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
