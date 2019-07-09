<?php

namespace App;

use App\Models\Client;
use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    protected $fillable = [
        'name', 'email', 'password','validate'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->hasRole('SuperAdmin') || $this->hasRole('Admin');
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('SuperAdmin');
    }

    public function isClient()
    {
        return $this->hasRole('Client');
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }


}
