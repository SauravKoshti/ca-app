<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    // Define the table name if it differs from the default
    protected $table = 'users';

    // The attributes that are mass assignable
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'mobile',
        'email',
        'dob',
        'pancard',
        'adharcard',
        'password',
    ];

    // The attributes that should be hidden for arrays
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // If you use any custom methods for the User model, you can add them here.
}
