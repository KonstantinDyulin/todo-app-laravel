<?php

namespace App\Data\Requests\Auth;

use Spatie\LaravelData\Data;

class LoginRequestData extends Data
{
    public function __construct(
        public string $email,
        public string $password
    ) {}
}
