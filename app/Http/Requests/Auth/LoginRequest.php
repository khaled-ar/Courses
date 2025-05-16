<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'    => ['required', 'email'],
            'password' => ['required', 'string']
        ];
    }

    public function authenticate()
    {
        return Auth::attempt(
            [
                'email'    => $this->email,
                'password' => $this->password,
            ]
        );
    }

    public function login() {
        if(! $this->authenticate())
            return $this->generalResponse(null, 'Wrong Data', 401);

        $user = User::whereEmail($this->email)->first();
        $user['token'] = $user->createToken($user->id)->plainTextToken;
        return $this->generalResponse($user, 'Login Done, Welcome Back!');
    }
}
