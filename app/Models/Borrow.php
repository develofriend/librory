<?php

namespace Librory\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
        'user_id',
        'librorian_id',
        'return_date',
        'status',
    ];

    protected $dates = [
        'return_date'
    ];

    /**
     * -------------------------------------------------------------------------
     * Relationship functions
     * -------------------------------------------------------------------------
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function librorian()
    {
        return $this->belongsTo(User::class, 'librorian_id', 'id');
    }
}
