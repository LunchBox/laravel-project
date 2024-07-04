<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthSessionController extends Controller
{
  public function store(Request $request)
  {
    if (! Auth::attempt($request->only('email', 'password'))) {
      throw ValidationException::withMessages([
        'email' => trans('auth.failed'),
      ]);
    }

    $token = $request->user()->createToken('user');
    return ['token' => $token->plainTextToken];
  }


  public function destroy(Request $request)
  {
    $request->user()->tokens()->delete();
    return ['message' => 'You are signed out.'];
  }
}
