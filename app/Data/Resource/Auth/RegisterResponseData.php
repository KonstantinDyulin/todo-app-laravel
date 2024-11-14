<?php

namespace App\Data\Resource\Auth;

use App\Data\Common\UserData;
use Spatie\LaravelData\Data;

class RegisterResponseData extends Data
{
    public function __construct(
        public UserData $user,
    ) {}
}
