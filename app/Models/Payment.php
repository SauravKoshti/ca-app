<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['payment_mode', 'payment_note', 'discuss_fees', 'paid_fees', 'user_id', 'payment_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPaymentDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = date('Y-m-d', strtotime($value));
    }
}