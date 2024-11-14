<?php

namespace App\Services\Auth;

use App\Data\Requests\Auth\LoginRequestData;
use App\Data\Requests\Auth\RegisterRequestData;
use App\Data\Resource\Auth\LoginResponseData;
use App\Data\Resource\Auth\RegisterResponseData;
use App\Data\Common\UserData;

interface IAuthService
{
    public function getUser(): UserData;
    public function register(RegisterRequestData $registerDTO): RegisterResponseData;
    public function login(LoginRequestData $loginData): LoginResponseData;
    public function logout();
}