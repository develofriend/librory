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

    public function bookCategoriesIdToArray()
    {
        return $this->bookCategories->pluck('category_id')->toArray();
    }
}
