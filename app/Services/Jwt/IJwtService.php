<?php

namespace App\Services\Jwt;

interface IJwtService
{
    public function createToken();
    public function parseToken(string $token);
    public function verifyToken(string $token);
}