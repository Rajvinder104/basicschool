<?php

use App\Http\Middleware\Adminmiddleware;
use App\Http\Middleware\Parentmiddleware;
use App\Http\Middleware\Studentmiddleware;
use App\Http\Middleware\Teachermiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => Adminmiddleware::class,
            'student' => Studentmiddleware::class,
            'teacher' => Teachermiddleware::class,
            'parent' => Parentmiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
