<?php

namespace Librory\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    protected $fillable = [
        'borrow_id',
        'book_id',
        'remark',
    ];

    /**
     * -------------------------------------------------------------------------
     * Relationship functions
     * -------------------------------------------------------------------------
     */

    public function borrow()
    {
        return $this->belongsTo(Borrow::class, 'borrow_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
