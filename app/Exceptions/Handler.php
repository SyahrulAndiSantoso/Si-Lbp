<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // public function report(Exception $exception)
    // {
    //     parent::report($exception);
    // }

    // /**
    //  * Render an exception into an HTTP response.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \Exception  $exception
    //  * @return \Illuminate\Http\Response
    //  */
    // public function render($request, Exception $exception)
    // {
    //     return parent::render($request, $exception);
    // }

    // protected function unauthenticated($request, \Illuminate\Auth\AuthenticationException $exception)
    // {
    //   if($request->expectsJson()){
    //     return response()->json(['error' => 'Unauthenticated.'], 401);
    //   }

    //   return redirect('/admin/login-admin');
    // }
}
