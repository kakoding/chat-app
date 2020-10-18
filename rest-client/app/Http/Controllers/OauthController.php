<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OauthController extends Controller
{
    // access token
    public function access()
    {
        $response = Http::post(config('services.oauth_server.uri') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => config('services.oauth_server.client_id'),
            'client_secret' => config('services.oauth_server.client_secret'),
            'username' => config('services.oauth_server.username'),
            'password' => config('services.oauth_server.password'),
            'scope' => '*'
        ]);

        $response = $response->json();

        $expired = now()->addSeconds($response['expires_in'])->isoFormat('DDMMYYYYHHmmss');
        session([
        	'access_token' => $response['access_token'],
        	'expires_in' => $expired,
        	'refresh_token' => $response['refresh_token']
        ]);
    }

    // refresh token
    public function refresh()
    {
        $response = Http::post(config('services.oauth_server.uri') . '/oauth/token', [
            'grant_type' => 'refresh_token',
            'refresh_token' => session('refresh_token'),
            'client_id' => config('services.oauth_server.client_id'),
            'client_secret' => config('services.oauth_server.client_secret'),
            'scope' => '*',
        ]);

        $response = $response->json();

        session()->forget(['access_token', 'expires_in', 'refresh_token']);

        $expired = now()->addSeconds($response['expires_in'])->isoFormat('DDMMYYYYHHmmss');
        session([
            'access_token' => $response['access_token'],
            'expires_in' => $expired,
            'refresh_token' => $response['refresh_token']
        ]);
    }
}
