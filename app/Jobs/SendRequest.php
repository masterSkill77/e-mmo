<?php

namespace App\Jobs;

use App\Mail\Agence\SendRequest as AgenceSendRequest;
use App\Models\Agence;
use App\Models\Request;
use App\Models\Role;
use App\Services\SmtpService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class SendRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly string $email, private readonly Role $role, private readonly Agence $agence)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $request = new Request([
            'email' => $this->email,
            'role_id' => $this->role->id,
            'agence_id' => $this->agence->id
        ]);
        $email = $this->email;
        $this->agence->configureEmails();
        Mail::to($email)->send(new AgenceSendRequest($this->agence, Crypt::encryptString($this->email)));
        $request->save();
    }
}
