<?php

namespace App\Http\Controllers\Api;

abstract class ApiController
{
    public function successResponse(array $data, string $message, int $statusCode = 200)
    {

    }

    public function failureResponse(string $error, string $message, int $statusCode = 400)
    {

    }
}