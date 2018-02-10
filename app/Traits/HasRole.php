<?php

namespace Librory\Traits;

use Librory\Models\Role;

trait HasRole
{
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function isLibrorian()
    {
        return $this->role_id == 1;
    }

    public function isMember()
    {
        return $this->role_id == 2;
    }
}
