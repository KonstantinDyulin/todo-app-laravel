<?php

namespace App\Data\DTO;

use Spatie\LaravelData\Contracts\ResponsableData;
use Spatie\LaravelData\Dto;

class LoginInputData extends Dto
{
    public function __construct(
        public string $email,
        public string $password
    ) {}
}
