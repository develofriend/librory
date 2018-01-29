<?php

namespace Librory\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * -------------------------------------------------------------------------
     * Scope functions
     * -------------------------------------------------------------------------
     */

    public function scopeOrderByName($query, $returnQuery = false)
    {
        $query = $query->orderBy('name');

        return $returnQuery ? $query : $query->get();
    }

    /**
     * -------------------------------------------------------------------------
     * Route functions
     * -------------------------------------------------------------------------
     */

    public function editUrl()
    {
        return route('authors.edit', [
            'author' => $this->id
        ]);
    }

    public function updateUrl()
    {
        return route('authors.update', [
            'author' => $this->id
        ]);
    }
}
