<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'email'    => ['required', 'email', 'unique:users,email'],
            'name'     => ['required', 'string', 'between:3,20'],
            'password' => ['required', 'string', Password::min(8)->max(25)->letters()->numbers()->mixedCase()->uncompromised()],
        ];
    }

    public function register() {
        $user = User::create($this->validated());
        $user['token'] = $user->createToken($user->id)->plainTextToken;
        return $this->generalResponse($user, 'Account Created Successfully', 201);
    }
}
