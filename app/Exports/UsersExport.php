<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    protected $userIds;

    public function __construct($userIds)
    {
        $this->userIds = $userIds;
    }

    public function collection()
    {
        return User::whereIn('id', $this->userIds)
            ->get([
                'first_name',
                'last_name',
                'username',
                'aadhar_card',
                'pan_card',
                'email',
                'gst_number',
                'anniversary_date',
                'mobile',
                'gender',
                'dob',
                'father_full_name',
                'user_type'
            ])
            ->map(function ($user) {
                return [
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'username' => $user->username,
                    'aadhar_card' => $user->aadhar_card,
                    'pan_card' => $user->pan_card,
                    'email' => $user->email,
                    'gst_number' => $user->gst_number,
                    'anniversary_date' => $user->anniversary_date,
                    'mobile' => $user->mobile,
                    'gender' => $user->gender == 0 ? 'Male' : 'Female',
                    'dob' => $user->dob,
                    'father_full_name' => $user->father_full_name,
                    'user_type' => $user->user_type
                ];
            });
    }

    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Username',
            'Aadhar Card',
            'PAN Card',
            'Email',
            'GST Number',
            'Anniversary Date',
            'Mobile',
            'Gender',
            'Date of Birth',
            'Father\'s Full Name',
            'User Type'
        ];
    }
}
