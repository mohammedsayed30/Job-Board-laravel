<?php

namespace App\Exceptions;

use Throwable;
/**
 * Illuminate\Auth\AuthenticationException
 *  This exception is thrown when a user is not authenticated but tries 
 * to access a route or resource that requires authentication.
 */
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
    }

   /**
    * unauthenticated()
    * It is called automatically when an AuthenticationException is thrown
    * @param Request The incoming HTTP request.
    * @param AuthenticationException The AuthenticationException instance that was thrown
    */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        /**
         * If the request expects JSON, the method returns a JSON response 
         * with a 401 Unauthorized status code and an error message ('Unauthenticated.').
         */
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        /**
         * redirect()->guest(): This method is used to redirect the user to 
         * a specific route (in this case, the login page) 
         * while storing the intended URL(the URL the user was trying to access) 
         * in the session. After the user logs in, 
         * they will be redirected back to the intended URL.
         */
        return redirect()->guest(route('login'));
    }
}
