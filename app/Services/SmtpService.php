<?php

namespace App\Services;

use App\Models\Agence;
use Illuminate\Support\Facades\Mail;

class SmtpService
{
    public function configureMails(int $agenceId)
    {
        $agence = Agence::where('id', $agenceId)->first();
        $agence->configureEmails();

        Mail::raw('Hello World!', function ($msg) {
            $msg->to('clairmont.rajaonarison@gmail.com')->subject('Test Email');
        });
    }
}
