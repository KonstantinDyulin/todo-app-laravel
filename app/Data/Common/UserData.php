<?php

namespace App\Data\Common;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
    ) {}
}
