<?php

namespace Librory\Models;

use Illuminate\Database\Eloquent\Model;

class BookCount extends Model
{
    protected $fillable = [
        'book_id',
        'quantity'
    ];
}
