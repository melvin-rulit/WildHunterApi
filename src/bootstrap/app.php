<?php

use App\Exceptions\BaseException;
use App\Http\Middleware\AttachTraceId;
use Illuminate\Foundation\Application;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
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
        $middleware->api(
        [
            AttachTraceId::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Throwable $e, $request) {

            if ($e instanceof AuthenticationException) {
                return response()->json([
                    'success' => false,
                    'message' => __('auth.errors.auth_token_error'),
                    'error_code' => 'auth_token_error',
                ], 401);
            }

            if ($e instanceof ValidationException) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ошибка валидации',
                    'error_code' => 'validation_error',
                    'errors' => $e->errors(),
                    'trace_id' => $request->attributes->get('trace_id')
                ], 422);
            }

            if ($e instanceof BaseException) {
                $message = $e->getDomain() . '.errors.' . $e->getErrorCode();

                return response()->json([
                    'success' => false,
                    'message' => __($message),
                    'error_code' => $e->getErrorCode(),
                    'errors' => [],
                    'trace_id' => $request->attributes->get('trace_id')
                ], $e->getStatus());
            }

            return null;

        });
    })->create();
