<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MarriageAnniversary;

class SendAnniversaryEmails extends Command
{
    protected $signature = 'email:anniversary';
    protected $description = 'Send anniversary emails to users';

    public function handle()
    {
        $users = User::whereMonth('anniversary_date', date('m'))
            ->whereDay('anniversary_date', date('d'))
            ->get();
        if ($users->count() > 0) {
            foreach ($users as $user) {
                Mail::to($user)->send(new MarriageAnniversary($user));
            }
        }
        return 0;
    }
    
//     public function handle()
//     {
//         $today = Carbon::now()->format('m-d');
//         $users = User::whereRaw("DATE_FORMAT(anniversary_date, '%m-%d') = ?", [$today])->get();

//         foreach ($users as $user) {
//             // Mail::raw("Happy Work Anniversary, {$user->name}! 🎉", function ($message) use ($user) {
//             //     $message->to($user->email)
//             //         ->subject('Happy Anniversary!');
//             // });
//             Mail::raw("
// Dear {$user->name},  

// Wishing you a very **Happy Marriage Anniversary!** 🎉💍  

// May this special day bring you and your partner **love, happiness, and cherished moments** that last a lifetime. Your journey together is truly inspiring, and we hope this year brings even more joy and togetherness!  

// Enjoy this beautiful occasion with your loved ones! 💖🎊  

// Best Wishes,  
// [Company Name]  
// [Company Email]  
// [Company Website]  
// ", function ($message) use ($user) {
//                 $message->to($user->email)
//                     ->subject('🎊 Happy Marriage Anniversary, ' . $user->name . '!');
//             });

//         }

//         $this->info('Anniversary emails sent successfully.');
//     }
}