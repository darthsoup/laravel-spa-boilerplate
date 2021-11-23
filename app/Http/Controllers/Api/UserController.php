<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();

        return response()->json(
            $user->only(['id', 'name', 'email'])
        );
    }
}
