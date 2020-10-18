<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\OauthController;

class PagesController extends OauthController
{
    public function __construct()
    {
        $this->access();
    }

    public function home()
    {
        return redirect('/signup');
    }

    public function signup()
    {
        if(session('msg_username')) {
            session()->forget('msg_username');
        }

        if(session('msg_fullname')) {
            session()->forget('msg_fullname');
        }

        if(session('msg_email')) {
            session()->forget('msg_email');
        }

        if(session('msg_password')) {
            session()->forget('msg_password');
        }

        return view('signup');
    }

    public function storeSignup(Request $request)
    {
        $currentTime = now()->isoFormat('DDMMYYYYHHmmss');
        $expired = session('expires_in');

        if ($currentTime > $expired) {
            return $this->refresh();
        }

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('access_token')
        ])->post(config('services.oauth_server.uri') . '/api/signup', [
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($response->failed()) {
            if(empty($response['errors']['username'][0])) {
                $username = $request->username;
            } elseif(isset($response['errors']['username'][0])) {
                session()->flash('msg_username', $response['errors']['username'][0]);
                $username = $request->username;
            } else {
                $username = $request->username;
            }

            if(empty($response['errors']['fullname'][0])) {
                $fullname = $request->fullname;
            } elseif(isset($response['errors']['fullname'][0])) {
                session()->flash('msg_fullname', $response['errors']['fullname'][0]);
                $fullname = $request->fullname;
            } else {
                $fullname = $request->fullname;
            }

            if(empty($response['errors']['email'][0])) {
                $email = $request->email;
            } elseif(isset($response['errors']['email'][0])) {
                session()->flash('msg_email', $response['errors']['email'][0]);
                $email = $request->email;
            } else {
                $email = $request->email;
            }

            if(empty($response['errors']['password'][0])) {
                $emptyPassword = '';
            } elseif(isset($response['errors']['password'][0])) {
                session()->flash('msg_password', $response['errors']['password'][0]);
                $emptyPassword = '';
            } else {
                $emptyPassword = '';
            }

            return view('signup', compact('username', 'fullname', 'email'));
        }

        return redirect('/signin');
    }

    public function signin()
    {
        return view('signin');
    }
}
