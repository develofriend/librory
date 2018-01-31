<?php

namespace Librory\Http\Controllers;

use Librory\Models\Shelf;
use Illuminate\Http\Request;
use Librory\Models\Category;
use Librory\Http\Requests\AddCategoryRequest;
use Librory\Http\Requests\EditCategoryRequest;

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
        $categories->load('shelf');

        return view('pages.categories.all', compact(
            'categories'
        ));
    }

    public function add()
    {
        $shelves = Shelf::all();

        return view('pages.categories.add', compact(
            'shelves'
        ));
    }

    public function save(AddCategoryRequest $request)
    {
        $category = Category::create($request->only([
            'name',
            'shelf_id'
        ]));

        return redirect()->route('categories.all')
            ->withStatus('Successfully created a new category.');
    }

    public function edit(Category $category)
    {
        $shelves = Shelf::all();

        return view('pages.categories.edit', compact(
            'shelves',
            'category'
        ));
    }

    public function update(EditCategoryRequest $request, Category $category)
    {
        $category->update($request->only([
            'name',
            'shelf_id'
        ]));

        return redirect()->route('categories.all')
            ->withStatus('Successfully update category info.');
    }
}
