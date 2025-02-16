<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendBirthdayEmails extends Command
{
    protected $signature = 'email:birthday';
    protected $description = 'Send birthday emails to users';

    public function handle()
    {
        $today = Carbon::now()->format('m-d');
        $users = User::whereRaw("DATE_FORMAT(dob, '%m-%d') = ?", [$today])->get();

        foreach ($users as $user) {
            // Mail::raw("Happy Birthday, {$user->name}! 🎉", function ($message) use ($user) {
            //     $message->to($user->email)
            //         ->subject('Happy Birthday!');
            // });
            Mail::raw("
                Dear {$user->name},  

                On behalf of everyone at [Company Name], we wish you a very **Happy Birthday!** 🎂🎉  

                May this special day bring you **happiness, success, and joy** in the year ahead. We truly appreciate you being a part of our **[Company Name] family**, and we look forward to celebrating many more milestones together!  

                Enjoy your day to the fullest! 🎈🎁  

                Best Wishes,  
                [Company Name]  
                [Company Email]  
                [Company Website]  
                ", function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('🎉 Happy Birthday, ' . $user->name . '!');
            });

        }

        $this->info('Birthday emails sent successfully.');
    }
}