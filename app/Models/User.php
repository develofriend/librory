<?php

namespace Librory\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function getNameAttribute()
    {
        return $this->attributes['last_name'] . ',
            ' . $this->attributes['first_name'];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function scopeMembers($query, $returnQuery = false)
    {
        $query = $query->where('role_id', 2);

        return $returnQuery ? $query : $query->get();
    }

    public function editMemberUrl()
    {
        return route('members.edit', [
            'member' => $this->id
        ]);
    }
}
