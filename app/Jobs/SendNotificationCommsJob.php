<?php

namespace App\Jobs;

use App\Mail\Agence\SendComsNotificationMail;
use App\Models\Agence;
use App\Models\Commentaire;
use App\Models\Estate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNotificationCommsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $commentaire;
    public $agence;
    /**
     * Create a new job instance.
     */
    public function __construct(Commentaire $commentaire, public Estate $estate)
    {
        $this->agence = Agence::where("id", $estate->agence_id)->first();
        $this->commentaire = Commentaire::where("id", $commentaire->id)->with(['estate', 'user'])->first();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->agence->agence_mail)->send(new SendComsNotificationMail($this->estate, $this->agence, $this->commentaire));
    }
}
