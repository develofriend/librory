<?php

namespace Librory\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'book_id',
        'category_id'
    ];
}
