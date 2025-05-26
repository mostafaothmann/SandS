<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // تحقق من صحة التوكن المرفق بالطلب
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            // إذا كان التوكن غير صالح أو غير مزود، إرجاع خطأ
            return response()->json(['error' => 'Token is invalid or not provided'], Response::HTTP_UNAUTHORIZED);
        }

        // تحقق من أن المستخدم هو Admin بناءً على الدور
        if ($user->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
        }

        // إذا كان التوكن صالحًا وكان المستخدم Admin، يتم متابعة الطلب
        return $next($request);

    }
}
