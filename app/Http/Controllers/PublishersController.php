<?php

namespace Librory\Http\Controllers;

use Illuminate\Http\Request;
use Librory\Models\Publisher;

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

    }

    public function save()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
