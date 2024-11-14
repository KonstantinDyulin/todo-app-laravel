<?php

namespace App\Services\Auth;

use App\Data\Common\UserData;
use App\Data\Requests\Auth\LoginRequestData;
use App\Data\Requests\Auth\RegisterRequestData;
use App\Data\Resource\Auth\LoginResponseData;

interface IAuthService
{
    public function getUser(): UserData;
    public function register(RegisterRequestData $registerDTO): UserData;
    public function login(LoginRequestData $loginData): LoginResponseData;
    public function logout(): void;
}