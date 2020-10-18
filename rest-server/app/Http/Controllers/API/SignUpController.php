<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Models\User;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignUpController extends BaseController
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password]
        ])->validate();

        User::create([
            'username' => $request['username'],
            'fullname' => $request['fullname'],
            'name' => $request['fullname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        return $this->sendResponse([], 'Registrasi akun berhasil');
    }
}
