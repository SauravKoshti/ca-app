<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Twilio\Rest\Client;

class SendBirthdayMessage extends Command
{
    protected $signature = 'send:birthday-sms';
    protected $description = 'Send a birthday SMS to users whose birthday is today';

    public function handle()
    {
        $users = User::whereRaw("DATE_FORMAT(dob, '%m-%d') = ?", [Carbon::now()->format('m-d')])->get();

        if ($users->isEmpty()) {
            $this->info("No birthdays today.");
            return;
        }

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
                $message = $twilio->messages->create(
                    '+91' .$user->mobile, // Recipient's phone number
                    [
                        "from" => $twilioPhoneNumber,
                        "body" => "🎉 Happy Birthday, {$user->name}! Have a fantastic day! 🎂"
                    ]
                );

                $this->info("Birthday SMS sent to: {$user->mobile}");
            } catch (\Exception $e) {
                $this->error("Failed to send SMS to {$user->mobile}: " . $e->getMessage());
            }
        }
    }
}
