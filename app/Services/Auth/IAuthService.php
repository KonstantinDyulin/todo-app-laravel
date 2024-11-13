<?php

namespace App\Services\Auth;

use App\Data\DTO\LoginInputData;
use App\Data\DTO\LoginOutputData;
use App\Data\DTO\RegisterInputData;
use App\Data\DTO\RegisterOutputData;

interface IAuthService
{
    public function getUser();
    public function register(RegisterInputData $registerDTO): RegisterOutputData;
    public function login(LoginInputData $loginData): LoginOutputData;
    public function logout();
}