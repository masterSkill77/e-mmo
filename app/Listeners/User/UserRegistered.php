<?php

namespace App\Listeners\User;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\User\UserRegistered as UserRegisteredEvent;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class UserRegistered
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegisteredEvent $event): void
    {
        $link = env("APP_URL") . "/api/v1/verify-email/" . Crypt::encryptString($event->user->email);
        Mail::to($event->user->email)->send(new ConfirmationMail($event->user, $link));
    }
}
