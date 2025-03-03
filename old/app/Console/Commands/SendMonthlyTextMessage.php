<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Twilio\Rest\Client;
use Carbon\Carbon;

class SendMonthlyTextMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:text-messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a text message to every user on the 1st, 2nd, 3rd, 4th, and 5th of each month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $twilioSid = env('TWILIO_SID');
        $twilioToken = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');
        $twilio = new Client($twilioSid, $twilioToken);
         $today = Carbon::now();
         $deadline = Carbon::now()->startOfMonth()->addDays(4); 
         $remainingDays = $deadline->diffInDays($today);
         $message = "Reminder: Only $remainingDays days left until the deadline on 5th! Take action now.";
        $users = User::whereNotNull('mobile')->get();

        foreach ($users as $user) {
            try {
            $response = $twilio->messages->create(
                '+91' .'7567405227',
                
                [
                    "from" => $twilioPhoneNumber,
                    "body" => $message
                ]
            );
            $this->info("Reminder SMS sent to: {$user->mobile}");
        } catch (\Exception $e) {
            $this->error("Failed to send SMS to {$user->mobile}: " . $e->getMessage());
        }
    }
}
}