<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactsExport implements FromCollection, WithHeadings
{
    protected $contactIds;

    public function __construct($contactIds)
    {
        $this->contactIds = $contactIds;
    }

    public function collection()
    {
        return Contact::whereIn('id', $this->contactIds)->get
        ->get([
            'name',
            'email',
            'mobile',
            'message'
        ])
        ->map(function ($contactUser) {
            return [
                'name' => $contactUser->name,
                'email' => $contactUser->email,
                'mobile' => $contactUser->mobile,
                'message' => $contactUser->message,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'name',
            'Email',
            'Mobile',
            'Message',
        ];
    }
}
