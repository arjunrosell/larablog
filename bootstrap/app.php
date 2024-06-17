<?php

use App\Mail\PostCountMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Application;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['can-view-post' => 'App\Http\Middleware\CanViewPostMiddleware::class']);
        $middleware->alias(['is-admin' => 'App\Http\Middleware\IsAdminMiddleware::class']);
    })

    ->withSchedule(function (Schedule $schedule) {
        $schedule->call(function() {
            Mail::to('admin@example.com')->send(new PostCountMail());
        })->everyMinute();
    })

    ->withExceptions(function (Exceptions $exceptions) {
        // $exceptions->render(function(NotFoundHttpException $exceptions) {
        //     if($exceptions->getPrevious() instanceof ModelNotFoundException) {
        //         return response()->json([
        //             'message' => 'Resource not found'
        //         ], 404);
        //     }
        // });
    })->create();
