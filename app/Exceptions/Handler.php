<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Request;
use Illuminate\Auth\AuthenticationException;
use Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            if ($request->is('api/*')) {
                return response()->json(['response' =>[
                                               'api_status'=> 0,
                                               'code'=> 404,
                                               'message'=> 'Not Found'
                                               ]
                                        ], 404);
            }
            return response()->view('404', [], 404);
        }

        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            return response()->json(['message' => __('general.UNAUTHORIZED')], 403);
        }
        
        return parent::render($request, $exception);
    }
    
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
                    ? response()->json(['response'=>[
                                                'api_status'=> 0,
                                                'Code'=>401,
                                                'Message' => 'Unauthenticated'                           
                                                ]
                                        ],401)
                    : redirect()->guest(route('login'));
    }

    // public function render($request, Exception $exception)
    // {
    //     return response()->json(
    //         [
    //             'response' => [
    //                 'api_status'=> 0,
    //                 'code' => 401,
    //                 'status' => 'unauthorized',
    //                 'message' => 'check your endpoint or http request',
    //             ]
    //         ]
    //     );
    // }

}
