<?php

namespace Librory\Models;

use Librory\Traits\HasRole;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRole;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'contact_number',
        'address',
        'role_id',
        'email',
        'password',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * -------------------------------------------------------------------------
     * Accessor functions
     * -------------------------------------------------------------------------
     */

    public function getNameAttribute()
    {
        return $this->attributes['last_name'] . ',
            ' . $this->attributes['first_name'];
    }

    /**
     * -------------------------------------------------------------------------
     * Mutator functions
     * -------------------------------------------------------------------------
     */

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * -------------------------------------------------------------------------
     * Scope functions
     * -------------------------------------------------------------------------
     */

    public function scopeMembers($query, $returnQuery = false)
    {
        $query = $query->where('role_id', 2);

        return $returnQuery ? $query : $query->get();
    }

    /**
     * -------------------------------------------------------------------------
     * Route functions
     * -------------------------------------------------------------------------
     */

    public function editMemberUrl()
    {
        return route('members.edit', [
            'member' => $this->id
        ]);
    }

    public function updateMemberUrl()
    {
        return route('members.update', [
            'member' => $this->id
        ]);
    }

    public function switchMemberStatusUrl()
    {
        return route('members.status.switch', [
            'member' => $this->id
        ]);
    }

    public function newBorrowBookUrl()
    {
        return route('borrow.new', [
            'user' => $this->id
        ]);
    }

    /**
     * -------------------------------------------------------------------------
     * Unsorted functions
     * -------------------------------------------------------------------------
     */

    public function switchStatus()
    {
        $this->is_active = ! $this->is_active;
        $this->save();

        return $this;
    }
}
