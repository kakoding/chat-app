<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\OauthController;
use Illuminate\Support\Facades\Hash;

class PagesController extends OauthController
{
    public function __construct()
    {
        $this->access();

        // $currentTime = now()->isoFormat('DDMMYYYYHHmmss');
        // $expired = session('expires_in');

        // if ($currentTime > $expired) {
        //     return $this->refresh();
        // }
        
    }

    public function home()
    {
        return redirect('/signin');
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

        return redirect('/signin')->with('success_msg', 'Pembuatan akun baru berhasil');
    }

    public function signin()
    {
        if(session('username')) {
            return redirect('/chats');      
        }
        return view('signin');
    }

    public function sendSignin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . session('access_token')
        ])->get(config('services.oauth_server.uri') . '/api/signin', ['email' => $request->email]);

        $user = json_decode($response, true);

        // jika usernya ada
        if ($user) {
            // cek password
            if (Hash::check($request->password, $user['data']['password'])) {
                session([
                    'username' => $user['data']['username'],
                    'fullname' => $user['data']['fullname'],
                    'email' => $user['data']['email']
                ]);
                return redirect('/chats');
            } else {
                return redirect()->back()->with('failed_msg', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('failed_msg', 'Email tidak terdaftar!');
        }
    }

    public function signout()
    {
        session()->forget(['username', 'fullname', 'email']);
        return redirect('/signin')->with('success_msg', 'Kamu telah sign out/log out!');
    }

    // uji coba sementara nanti dihapus methodnya lalu buat controller baru
    public function chats()
    {
        if(!session('username')) {
            return redirect('/signin');
        }
        return view('chats/chats');
    }
}
