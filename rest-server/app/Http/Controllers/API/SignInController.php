<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignInController extends BaseController
{
     public function signin(Request $request)
    {
    	$user = User::where('email', $request['email'])->first();
        if($user) {
        	$d = [
                'username' => $user->username,
                'fullname' => $user->fullname,
                'email' => $user->email,
                'password' => $user->password
        	];
            return $this->sendResponse($d, 'mengambil data user berhasil');
        } else {
            $d = [];
            return $this->sendResponse($d, 'mengambil data user gagal karena email tidak terdaftar');
        }
    }
}
