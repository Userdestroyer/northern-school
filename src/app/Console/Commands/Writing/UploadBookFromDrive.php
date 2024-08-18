<?php

namespace App\Console\Commands\Writing;

use Google\Client;
use Google\Service\Docs;
use Illuminate\Console\Command;

class UploadBookFromDrive extends Command
{
    protected Client $client;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'books:upload:from-drive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload book content from Google Drive';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->client = new Client();
        $this->client->setApplicationName(config('google.application_name'));
        $this->client->setClientId(config('google.client_id'));
        $this->client->setClientSecret(config('google.client_secret'));
        $this->client->setRedirectUri(config('google.redirect_uri'));
        $this->client->setScopes(config('google.scopes'));
        $this->client->setAccessType(config('google.access_type'));

        $tokenPath = storage_path(config('google.service.file'));
        $accessToken = file_get_contents($tokenPath);
        $this->client->setAccessToken($accessToken);

        $documentId = '';

        // фикс обновление токена

        $docsService = new Docs($this->client);
        $document = $docsService->documents->get($documentId);

        dd($document->getBody()->getContent()[15]);
    }
}
