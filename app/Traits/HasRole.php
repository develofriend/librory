<?php

namespace Librory\Traits;

trait HasRole
{
    public function isLibrorian()
    {
        return $this->role_id == 1;
    }

    public function isMember()
    {
        return $this->role_id == 2;
    }
}
