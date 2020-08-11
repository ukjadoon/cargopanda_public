<?php

namespace App\Jobs;

use App\Document;
use App\Mail\DocExpiresOnReminder;
use App\Organization;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ProcessExpiresOn implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $expiresOn = [
        'today',
        '+1 day',
        '+2 days',
        '+3 days',
        '+1 week',
        '+1 month',
        '+2 months',
        '+3 months',
    ];

    public $expiringDocs = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->handleTruckDocuments();
        $this->handleOrganizationDocuments();
        foreach($this->expiringDocs as $organizationId => $expiringDoc) {
            $user = User::where('organization_id', $organizationId)->firstOrFail();
            $organization = Organization::findOrFail($organizationId);
            Mail::to($user->email)
                ->send(new DocExpiresOnReminder($user, $organization, $expiringDoc));
        }
    }

    private function handleTruckDocuments()
    {
        $documents = Document::select('id')->whereHas('trucks', function ($q) {

            return $q->where('document_truck.expires_on', '>=', Carbon::parse('today'));
        })->get();
        $documents->each(function ($document) {
            $document = Document::find($document->id);
            foreach ($this->expiresOn as $expiresOn) {
                $result = $document->trucks->where('pivot.expires_on', Carbon::parse($expiresOn)->toDateString())->first();
                if ($result) {
                    $this->expiringDocs[$document->trucks->first()->organization_id]['truckDocs'][$expiresOn] = $document;
                }
            }
        });
    }

    private function handleOrganizationDocuments()
    {
        $documents = Document::select('id')->whereHas('organizations', function ($q) {

            return $q->where('document_organization.expires_on', '>=', Carbon::parse('today'));
        })->get();
        $documents->each(function ($document) {
            $document = Document::find($document->id);
            foreach ($this->expiresOn as $expiresOn) {
                $result = $document->organizations->where('pivot.expires_on', Carbon::parse($expiresOn)->toDateString())->first();
                if ($result) {
                    $this->expiringDocs[$document->organizations->first()->id]['organizationDocs'][$expiresOn] = $document;
                }
            }
        });
    }

    public function processEmails()
    {

    }
}
