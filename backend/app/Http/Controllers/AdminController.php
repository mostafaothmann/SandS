<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    // استعراض جميع الـ Admins
    public function index()
    {

    }

    // إضافة Admin جديد
    public function store(Request $request)
    {

    }

    // استعراض Admin واحد
    public function show($id)
    {

    }

    // تحديث Admin
    public function update(Request $request, $id)
    {

    }

    // حذف Admin
    public function destroy($id)
    {

    }
    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if ($token = Auth::guard('admin')->attempt($credentials)) {

            return response()->json(['token' => $token], 200);
        }


        return response()->json(['error' => 'Invalid username or password.'], 401);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    // مثال على دالة محمية تحتاج إلى تحقق من التوكن
    public function profile()
    {
        $admin = Auth::user();
        if ($admin) {
            return response()->json($admin);
        } else {
            return response()->json(['error' => 'Not authenticated'], 401);
        }
    }
}
