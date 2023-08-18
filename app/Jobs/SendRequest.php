<?php

namespace App\Jobs;

use App\Models\Agence;
use App\Models\Request;
use App\Models\Role;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
        $request->save();
    }
}
