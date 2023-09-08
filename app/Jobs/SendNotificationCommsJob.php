<?php

namespace App\Jobs;

use App\Models\Commentaire;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendNotificationCommsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     */
    public function __construct(public Commentaire $commentaire)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info(json_encode([$this->commentaire->estate(), $this->commentaire->user()]));
    }
}
