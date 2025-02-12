<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;


use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\AuthenticationException;

use Illuminate\Http\Request;

class Handler extends ExceptionHandler
{
  /**
   * The list of the inputs that are never flashed to the session on validation exceptions.
   *
   * @var array<int, string>
   */
  protected $dontFlash = [
    'current_password',
    'password',
    'password_confirmation',
  ];

  /**
   * Register the exception handling callbacks for the application.
   */
  public function register(): void
  {
    $this->reportable(function (Throwable $e) {
      //
    });

    $this->renderable(function (AuthenticationException $e, Request $request) {
      // if ($request->expectsJson()) {
      if( $request->is('api/*')){
        return response()->json(['message' => 'Please Login!'], 401);
      }
    });

    $this->renderable(function (NotFoundHttpException $e, Request $request) {
      // if ($request->expectsJson()) {
      if( $request->is('api/*')){
        return response()->json(['message' => 'Not Found!'], 404);
      }
    });
  }
}
