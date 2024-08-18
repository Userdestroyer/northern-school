<?php

namespace App\Http\Controllers;

use Google\Client;
use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName(config('google.application_name'));
        $this->client->setClientId(config('google.client_id'));
        $this->client->setClientSecret(config('google.client_secret'));
        $this->client->setRedirectUri(config('google.redirect_uri'));
        $this->client->setScopes(config('google.scopes'));
        $this->client->setAccessType('offline');
        $this->client->setPrompt('consent');
    }

    public function login()
    {
        $authUrl = $this->client->createAuthUrl();
        return redirect($authUrl);
    }

    public function callback(Request $request)
    {
        if ($request->has('code')) {
            $code = $request->get('code');
            $token = $this->client->fetchAccessTokenWithAuthCode($code);

            if (!isset($token['error'])) {
                $this->client->setAccessToken($token);
                
                // Save the token in a file
                $tokenPath = storage_path('');
                file_put_contents($tokenPath, json_encode($this->client->getAccessToken()));

                return "Token stored successfully.";
            } else {
                return "Error fetching access token.";
            }
        } else {
            return "No authorization code found.";
        }
    }
}
