<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;

class AuthenticateWithoutHash
{
    public function __invoke(array $input)
    {
        // Find the user by email
        $user = User::where('email', $input['email'])->first();

        // Check if the password matches without hashing
        if ($user && $user->password === $input['password']) {
            Auth::login($user);  // Login the user
            return $user;  // Return user to allow Fortify to handle the redirect
        }

        // If authentication fails, throw an exception
        throw new AuthenticationException('The provided credentials do not match our records.');
    }
}
