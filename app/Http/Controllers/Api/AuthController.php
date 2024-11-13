<?php

namespace App\Http\Controllers\Api;

use App\Data\DTO\LoginInputData;
use App\Data\DTO\RegisterInputData;
use App\Http\Resources\UserResource;
use Exception;
use App\Services\Auth\IAuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

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

    public function register(RegisterRequest $request)
    {
        $registerData = new RegisterInputData(...$request->validated());

        $registeredUser = $this->authService->register($registerData);

        return response()->json([
            'message' => 'Registration successful.',
            'data' => [
                'user' => $registeredUser->user
            ]
        ]);
    }

    public function login(LoginRequest $request)
    {
        $loginData = new LoginInputData(...$request->validated());

        try {
            $userWithToken = $this->authService->login($loginData);
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }

        return response()->json([
            'message' => 'Login successful.',
            'data' => [
                'user' =>  $userWithToken->user,
                'token' => $userWithToken->token
            ]
        ]);
    }

    public function logout()
    {
        $this->authService->logout();
    }
}
