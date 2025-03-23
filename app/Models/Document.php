<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'created_by',
        'uploaded_by',
        'document_name',
        'doc_type',
        'document_image_path',
        'upload_type',
        'financial_year',
        'date_from',
        'date_to',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function setDateFromAttribute($value)
    {
        $this->attributes['date_from'] = date('Y-m-d', strtotime($value));
    }

    public function setDateToAttribute($value)
    {
        $this->attributes['date_to'] = date('Y-m-d', strtotime($value));
    }
    
}
