<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Ei project e Laravel er default "login" route nei — admin panel er
        // route gulo "admin.login" / "admin.dashboard" name ache. Tai auth/guest
        // middleware ekhanei pathano hoy, nahole "Route [login] not defined" ashe.
        $middleware->redirectGuestsTo(fn (Request $request) => route('admin.login'));
        $middleware->redirectUsersTo(fn (Request $request) => route('admin.dashboard'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create()->usePublicPath(dirname(__DIR__).'/public');

// Standard Laravel: local PC ar server — dutotei root er ".env" load hoy.
// Alada .env.production er kono byabostha nei, server e sudhu ".env" banalei hobe.

return $app;
