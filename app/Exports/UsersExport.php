<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    protected $users;
    protected $payment_year;
    protected $payment_data;

    public function __construct($users, $payment_year, $payment_data)
    {
        $this->users = $users;
        $this->payment_year = $payment_year;
        $this->payment_data = $payment_data;
    }

    public function view(): View
    {
        return view('exports.users', [
            'users' => $this->users,
            'payment_year' => $this->payment_year,
            'payment_data' => $this->payment_data
        ]);
    }
}
