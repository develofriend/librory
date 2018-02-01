<?php

namespace Librory\Models;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'book_id',
        'author_id',
    ];
}
