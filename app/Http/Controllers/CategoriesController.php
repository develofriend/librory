<?php

namespace Librory\Http\Controllers;

use Illuminate\Http\Request;
use Librory\Models\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('librorian');
    }

    public function all()
    {
        $categories = Category::orderByName();

        return view('pages.categories.all', compact(
            'categories'
        ));
    }

    public function add()
    {

    }

    public function save(Request $request)
    {

    }

    public function edit(Category $category)
    {

    }

    public function update(Request $request, Category $category)
    {

    }
}
