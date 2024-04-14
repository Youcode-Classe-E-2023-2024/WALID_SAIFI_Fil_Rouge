<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function isAdmin()
    {
        return $this->roles()->where('role_id', 1)->exists();
    }

    public function isVendor()
    {
        return $this->roles()->where('role_id', 2)->exists();
    }

    public function isUser()
    {
        return $this->roles()->where('role_id', 3)->exists();
    }
}
