<?php

namespace App\Http\Controllers\JWT;

use App\Http\Controllers\AuthController;
use App\Http\Requests\JWT\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthenticatedSessionController extends AuthController
{
    protected ?string $guard = 'jwt';

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $token = $request->authenticate();

        return $this->respondWithToken($token);
    }

    public function destroy(Request $request): JsonResponse
    {
        auth()->logout();

        return response()->json([
            'status' => Response::HTTP_NO_CONTENT
        ]);
    }

    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'accessToken' => $token,
            'type' => 'bearer',
            'expiresIn' => auth()->factory()->getTTL() * 60
        ]);
    }
}
