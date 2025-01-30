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
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Document extends Model
// {
//     use HasFactory;

//     protected $table = 'documents';

//     protected $fillable = [
//         'user_id',
//         'created_by',
//         'uploaded_by',
//         'document_name',
//         'doc_type',
//         'document_image_path',
//     ];

//     /**
//      * Get the user that owns the document.
//      */
//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }

//     /**
//      * Get the user who created the document.
//      */
//     public function createdBy()
//     {
//         return $this->belongsTo(User::class, 'created_by');
//     }

//     /**
//      * Get the user who uploaded the document.
//      */
//     public function uploadedBy()
//     {
//         return $this->belongsTo(User::class, 'uploaded_by');
//     }
}
