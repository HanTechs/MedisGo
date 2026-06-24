<?php

namespace App\Http\Controllers\Validation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller
{
    // Login Page Validation
    public function validateLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:user,email',
            'password' => 'required|min:8',
        ];

        $messages = [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak terdaftar dalam sistem.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal harus 8 karakter.',
        ];

        // If validating a single field on-the-fly
        if ($request->has('field')) {
            $field = $request->input('field');
            if (array_key_exists($field, $rules)) {
                $rules = [$field => $rules[$field]];
            }
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        return response()->json([
            'success' => true
        ]);
    }
}
