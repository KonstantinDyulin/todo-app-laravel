<?php

namespace App\Data\Common;

use Spatie\LaravelData\Data;

class TaskCategoryData extends Data
{
    public function __construct(
        public string $id,
        public string $name,
        public string $user_uuid,
    ) {}
}
