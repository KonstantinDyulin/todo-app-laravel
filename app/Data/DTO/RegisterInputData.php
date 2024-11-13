<?php

namespace App\Data\DTO;

use Spatie\LaravelData\Dto;

class RegisterInputData extends Dto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}
}
