<?php

namespace App\Trait;

use App\Models\Agence;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;

trait UseMailFromAgence
{
    private function getSmtpCredentials(int $agenceId): array
    {
        $agence = Agence::where('id', $agenceId)->first();
        if ($agence)
            return [
                'host' => $agence->agence_smtp_host,
                'username' => $agence->agence_smtp_username,
                'port' => $agence->agence_smtp_port,
                'password' => $agence->agence_smtp_password,
                'sender' => $agence->agence_sender_mail
            ];
        return null;
    }


    public function configureEmails(): void
    {
        $sender = Config::get('mail.from');
        $mailer = Config::get('mail.mailers.smtp');
        $smtpCredentials = $this->getSmtpCredentials($this->id);
        if (isset($smtpCredentials['sender'])) {
            $sender = [
                'address' => $smtpCredentials['sender'],
                'name' => $smtpCredentials['sender'],
            ];
        }
        if (isset($smtpCredentials['host'], $smtpCredentials['username'], $smtpCredentials['password'])) {
            $mailer = [
                'driver' => 'smtp',
                'transport' => 'smtp',
                'host' => $smtpCredentials['host'],
                'port' => $smtpCredentials['port'],
                'username' => $smtpCredentials['username'],
                'password' => $smtpCredentials['password'],
                'encryption' => 'tls',
                'timeout' => null,
            ];
        }

        config()->set('mail.from', $sender);
        config()->set('mail.mailers.smtp', $mailer);
    }
}
