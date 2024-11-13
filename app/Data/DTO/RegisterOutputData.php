<?php

namespace App\Data\DTO;

use App\Models\User;
use Spatie\LaravelData\Dto;

class RegisterOutputData extends Dto
{
    public function __construct(
        public User $user,
    ) {}
}
