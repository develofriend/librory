<?php

namespace Librory\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [
        'name',
        'address',
        'email',
        'contact_number',
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
        return route('publishers.edit', [
            'publisher' => $this->id
        ]);
    }

    public function updateUrl()
    {
        return route('publishers.update', [
            'publisher' => $this->id
        ]);
    }
}
