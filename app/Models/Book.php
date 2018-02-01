<?php

namespace Librory\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'isbn',
        'edition',
        'volume',
        'issue',
        'publisher_id',
        'cover',
    ];

    /**
     * -------------------------------------------------------------------------
     * Relationship functions
     * -------------------------------------------------------------------------
     */

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }

    public function bookCategories()
    {
        return $this->hasMany(BookCategory::class, 'book_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories', 'book_id', 'category_id');
    }

    public function bookAuthors()
    {
        return $this->hasMany(BookAuthor::class, 'book_id', 'id');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors', 'book_id', 'author_id');
    }

    /**
     * -------------------------------------------------------------------------
     * Scope functions
     * -------------------------------------------------------------------------
     */

    public function scopeOrderByTitle($query, $returnQuery = false)
    {
        $query = $query->orderBy('title');

        return $returnQuery ? $query : $query->get();
    }

    /**
     * -------------------------------------------------------------------------
     * Route functions
     * -------------------------------------------------------------------------
     */

    public function editUrl()
    {
        return route('books.edit', [
            'book' => $this->id
        ]);
    }

    public function updateUrl()
    {
        return route('books.update', [
            'book' => $this->id
        ]);
    }

    /**
     * -------------------------------------------------------------------------
     * Unsorted functions
     * -------------------------------------------------------------------------
     */

    public function linkCategories($categories)
    {
        if (count($categories) == 0) {
            return;
        }

        if (count($this->bookCategories) > 0) {
            $this->bookCategories()->delete();
        }

        $categories = Category::whereIn('id', $categories)->get();
        $data = [];
        foreach ($categories as $category) {
            array_push($data, [
                'book_id' => $this->id,
                'category_id' => $category->id
            ]);
        }

        BookCategory::insert($data);
    }

    public function linkAuthors($authors)
    {
        if (count($authors) == 0) {
            return;
        }

        if (count($this->bookAuthors) > 0) {
            $this->bookAuthors()->delete();
        }

        $data = [];
        foreach ($authors as $name) {
            $author = Author::firstOrCreate([
                'name' => $name
            ]);

            array_push($data, [
                'book_id' => $this->id,
                'author_id' => $author->id
            ]);
        }

        BookAuthor::insert($data);
    }

    public function bookCategoriesIdToArray()
    {
        return $this->bookCategories->pluck('category_id')->toArray();
    }
}
