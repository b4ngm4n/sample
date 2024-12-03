<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
            
        });
    }

    public function render($request, Throwable $e)
    {
        // Handle 403 Forbidden
    if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $e->getStatusCode() === 403) {
        return response()->view('errors.page.403', [], 403);
    }

    // Handle 404 Not Found
    if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
        return response()->view('errors.page.404', [], 404);
    }

    // Handle 500 Internal Server Error
    if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $e->getStatusCode() === 500) {
        return response()->view('errors.page.500', [], 500);
    }

    // Handle 503 Internal Server Error
    if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $e->getStatusCode() === 503) {
        return response()->view('errors.page.503', [], 503);
    }

    // Fallback to default behavior
    return parent::render($request, $e);
    }
}
