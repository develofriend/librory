<?php

namespace Librory\Models;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * -------------------------------------------------------------------------
     * Route functions
     * -------------------------------------------------------------------------
     */

    public function editUrl()
    {
        return route('shelves.edit', [
            'shelf' => $this->id
        ]);
    }

    public function updateUrl()
    {
        return route('shelves.update', [
            'shelf' => $this->id
        ]);
    }
}
