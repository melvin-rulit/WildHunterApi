<?php

use App\Exceptions\BaseException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Throwable $e, $request) {

            if ($e instanceof BaseException) {
                $message = $e->getDomain() . '.errors.' . $e->getErrorCode();

                return response()->json([
                    'success' => false,
                    'message' => __($message),
                    'error_code' => $e->getErrorCode(),
                    'trace_id' => $request->attributes->get('trace_id')
                ], $e->getStatus());
            }

            return null;

        });
    })->create();
