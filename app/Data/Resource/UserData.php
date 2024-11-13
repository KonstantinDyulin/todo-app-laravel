<?php

namespace App\Data\Resource;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        private string $id,
        private string $name,
        private string $email,
    ) {}
}
