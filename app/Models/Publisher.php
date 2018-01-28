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
}
