<?php

namespace App\Services;

use App\Models\Agence;
use Illuminate\Support\Facades\Mail;

class SmtpService
{
    private function getSmtpCredentials(int $agenceId): array
    {
        $agence = Agence::where('id', $agenceId)->first();
        return [
            'host' => $agence->agence_smtp_host,
            'username' => $agence->agence_smtp_username,
            'port' => $agence->agence_smtp_port,
            'password' => $agence->agence_smtp_password,
            'sender' => $agence->agence_sender_mail
        ];
    }
    public function configureMails(int $agenceId)
    {
        $smtpCredentials = $this->getSmtpCredentials($agenceId);

        $mailerForAgence = true;
        return $mailerForAgence;
    }
}
