<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\BusinessReminderMail;
use Carbon\Carbon;

class SendReminderMail extends Command
{
    protected $signature = 'send:business-reminder';
    protected $description = 'Send reminder emails to business users to submit details to the Chartered Accountant';

    public function handle()
    {
        // Get the current day
        $currentDate = Carbon::now()->day;

        // Check if today is between the 1st and 5th
        if ($currentDate < 1 || $currentDate > 5) {
            $this->info('Not within the scheduled date range (1st to 5th). Exiting...');
            return;
        }

        // Get all business-type users (assuming user_type column exists)
        $businessUsers = User::where('user_type', 'business')->get();

        if ($businessUsers->isEmpty()) {
            $this->info('No business users found.');
            return;
        }

        foreach ($businessUsers as $user) {
            Mail::to($user->email)->send(new BusinessReminderMail($user));
        }

        $this->info('Reminder emails sent successfully to business users.');
    }
}
