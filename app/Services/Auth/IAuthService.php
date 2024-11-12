<?php

namespace App\Services\Auth;

use App\DTO\Auth\LoginDTO;
use App\DTO\Auth\RegisterDTO;

interface IAuthService
{
    public function getUser();
    public function register(RegisterDTO $registerDTO);
    public function login(LoginDTO $loginDTO);
    public function logout();

}