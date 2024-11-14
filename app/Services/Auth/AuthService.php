<?php

namespace App\Services\Auth;

use App\Data\Common\UserData;
use App\Data\Requests\Auth\LoginRequestData;
use App\Data\Requests\Auth\RegisterRequestData;
use App\Data\Resource\Auth\LoginResponseData;
use App\Data\Resource\Auth\RegisterResponseData;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements IAuthService
{
    public function getUser(): UserData
    {
        return UserData::from(Auth::user());
    }

    public function register(RegisterRequestData $registerDTO): RegisterResponseData
    {
        $user = User::create([
            'name' => $registerDTO->name,
            'email' => $registerDTO->email,
            'password' => Hash::make($registerDTO->password),
        ]);

        return new RegisterResponseData(
            UserData::from($user),
        );
    }

    /**
     * @throws Exception
     */
    public function login(LoginRequestData $loginData): LoginResponseData
    {
        $user = User::where('email', $loginData->email)->first();

        if (!$user) {
            throw new Exception('User with provided email does not exists.');
        }

        if (!Hash::check($loginData->password, $user->password)) {
            throw new Exception('Provided password does not match.');
        }

        return new LoginResponseData(
            UserData::from($user),
            $user->createToken('app_token')->plainTextToken
        );
    }

    public function logout(): void
    {
        $user = Auth::user();

        $user->tokens()->delete();
    }
}