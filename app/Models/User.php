<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function hasRole($role)
    {
        if ($this->role == $role) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        return $this->hasRole('ADMIN');
    }

    public function isClient()
    {
        return $this->hasRole('CLIENT');
    }

    public function isOwner()
    {
        return $this->hasRole('OWNER');
    }

}
