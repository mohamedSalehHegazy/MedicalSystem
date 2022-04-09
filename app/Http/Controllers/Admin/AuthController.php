<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin  as Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
    * Get All Records
    * @return \Illuminate\Http\JsonResponse
    */
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->guard('admin')->attempt($credentials)) {
            return response()->json(['error' => 'invalid credintial'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function profile()
    {
        return response()->json(auth()->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'success' => true,
            'data'=>auth()->guard('admin')->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->guard('admin')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
