<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Twilio\Rest\Client;

class SendAnniversarySms extends Command
{
    protected $signature = 'send:anniversary-sms';
    protected $description = 'Send an anniversary SMS to users whose anniversary is today';

    public function handle()
    {
        // Get users whose anniversary is today
        $users = User::whereRaw("DATE_FORMAT(anniversary_date, '%m-%d') = ?", [Carbon::now()->format('m-d')])->get();

        if ($users->isEmpty()) {
            $this->info("No anniversaries today.");
            return;
        }

        // Initialize Twilio
        $twilioSid = env('TWILIO_SID');
        $twilioToken = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');
        $twilio = new Client($twilioSid, $twilioToken);

        foreach ($users as $user) {
            if (!$user->mobile) {
                $this->warn("User {$user->name} has no phone number.");
                continue;
            }

            try {
                // Send SMS
                $message = $twilio->messages->create(
                    '+91'.$user->mobile, // Recipient's phone number
                    [
                        "from" => $twilioPhoneNumber,
                        "body" => "🎉 Happy Anniversary, {$user->name}! Wishing you a wonderful day filled with love and joy! ❤️"
                    ]
                );

                $this->info("Anniversary SMS sent to: {$user->mobile}");
            } catch (\Exception $e) {
                $this->error("Failed to send SMS to {$user->mobile}: " . $e->getMessage());
            }
        }
    }
}
