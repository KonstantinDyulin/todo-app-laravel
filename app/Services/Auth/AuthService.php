<?php

namespace App\Services\Auth;

use App\Data\DTO\LoginInputData;
use App\Data\DTO\LoginOutputData;
use App\Data\DTO\RegisterInputData;
use App\Data\DTO\RegisterOutputData;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements IAuthService
{
    public function getUser(): User
    {
        return Auth::user();
    }

    public function register(RegisterInputData $registerDTO): RegisterOutputData
    {
        $user = User::create([
            'name' => $registerDTO->name,
            'email' => $registerDTO->email,
            'password' => Hash::make($registerDTO->password),
        ]);

        return new RegisterOutputData($user);
    }

    /**
     * @throws Exception
     */
    public function login(LoginInputData $loginData): LoginOutputData
    {
        $user = User::where('email', $loginData->email)->first();

        if (!$user) {
            throw new Exception('user with provided email does not exists.');
        }

        if (!Hash::check($loginData->password, $user->password)) {
            throw new Exception('Provided password does not match.');
        }

        $token = $user->createToken('app_token')->plainTextToken;

        return new LoginOutputData($user, $token);
    }

    public function logout()
    {
        // TODO: Implement logout() method.
    }
}