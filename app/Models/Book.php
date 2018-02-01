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
}
