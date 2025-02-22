<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\BirthDayWish;

class SendBirthdayEmails extends Command
{
    protected $signature = 'email:birthday';
    protected $description = 'Send birthday emails to users';

    public function handle()
    {
        $users = User::whereMonth('dob', date('m'))
            ->whereDay('dob', date('d'))
            ->get();
        if ($users->count() > 0) {
            foreach ($users as $user) {
                Mail::to($user)->send(new BirthDayWish($user));
            }
        }
        return 0;
    }
}