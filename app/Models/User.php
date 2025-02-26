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
        'first_name',
        'last_name',
        'username',
        'name',
        'address',
        'city',
        'pincode',
        'aadhar_card',
        'pan_card',
        'company_name',
        'profile_image',
        'email',
        'gst_number',
        'anniversary_date',
        'mobile',
        'gender',
        'dob',
        'password',
        'father_full_name',
        'user_type',
        'group_id',
        'refer'
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

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getDobAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function getAnniversaryDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
}
