<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;
    protected $verificationSid;

    public function __construct()
    {
        $this->client = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        $this->verificationSid = config('services.twilio.verification_sid');
    }

    public function sendVerificationCode($phoneNumber)
    {
        return $this->client->verify->v2->services($this->verificationSid)
            ->verifications
            ->create($phoneNumber, "sms");
    }

    public function verifyCode($phoneNumber, $code)
    {
        $verificationCheck = $this->client->verify->v2->services($this->verificationSid)
            ->verificationChecks
            ->create([
                'to' => $phoneNumber,
                'code' => $code
            ]);

        return $verificationCheck->status === 'approved';
    }
}
