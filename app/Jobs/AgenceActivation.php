<?php

namespace App\Jobs;

use App\Mail\SendAgenceActivationMail;
use App\Models\Agence;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AgenceActivation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Agence $agence)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = User::where("email", $this->agence->responsable->email)->first();
        $user->user_type = 1;
        $user->update();
        Mail::to($this->agence->responsable->email)->send(new SendAgenceActivationMail($this->agence));
    }
}
