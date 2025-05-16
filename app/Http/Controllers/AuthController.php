<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\{
    RegisterRequest,
    LoginRequest
};

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        return $request->register();
    }

        public function login(LoginRequest $request) {
        return $request->login();
    }
}
