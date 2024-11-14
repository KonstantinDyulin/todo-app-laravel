<?php

namespace App\Http\Controllers\Api;

use App\Data\Requests\Auth\LoginRequestData;
use App\Data\Requests\Auth\RegisterRequestData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\Auth\IAuthService;
use Exception;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AuthController extends Controller implements HasMiddleware
{
    public function __construct(
        private readonly IAuthService $authService,
    ){}

    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', only: [
                'user',
                'logout'
            ])
        ];
    }

    public function user()
    {
        $user = $this->authService->getUser();

        return response()->json([
            'message' => 'Current authenticated user.',
            'data' => [
                'user' => $user
            ]
        ]);
    }

    public function register(RegisterRequestData $registerRequestData)
    {
        $registeredUser = $this->authService->register($registerRequestData);

        return response()->json([
            'message' => 'Registration successful.',
            'data' => $registeredUser->toArray()
        ]);
    }

    public function login(LoginRequestData $loginRequestData)
    {
        try {
            $userWithToken = $this->authService->login($loginRequestData);
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }

        return response()->json([
            'message' => 'Login successful.',
            'data' => $userWithToken->toArray()
        ]);
    }

    public function logout()
    {
        $this->authService->logout();

        return response()->json([
            'message' => 'Logout successful.',
            'data' => null
        ], 200);
    }
}
