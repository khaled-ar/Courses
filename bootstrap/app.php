<?php

use Illuminate\Foundation\{
    Application,
    Configuration\Exceptions,
    Configuration\Middleware
};

use Illuminate\Database\{
    QueryException,
    UniqueConstraintViolationException,

};

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {})
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Exception|Throwable $e, Request $request) {

            if ($e instanceof ThrottleRequestsException) {
                return response()->json([
                    'message' => 'Try Again Later.',
                ], 429);
            }

            if ($e instanceof NotFoundHttpException) {
                return response()->json([
                    'message' => 'Not Found.',
                ], 404);
            }

            if ($e instanceof AuthorizationException) {
                return response()->json([
                    'message' => 'This Action Not Allowed.',
                ], 403);
            }

            if ($e instanceof UniqueConstraintViolationException) {
                return response()->json([
                    'message' => 'Recoed Already Exists.',
                ]);
            }

            if ($e instanceof QueryException) {
                return response()->json([
                    'message' => 'Unknown Error!',
                ], 500);
            }

            if ($e instanceof ValidationException) {
                $res_errors = collect($e->errors())
                    ->flatten()
                    ->values()
                    ->all();

                return response()->json([
                    'errors' => $res_errors,
                ], 422);
            }
        });
    })->create();
