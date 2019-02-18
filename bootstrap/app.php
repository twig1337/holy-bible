<?php

require_once __DIR__ . '/../vendor/autoload.php';

(new Dotenv\Dotenv(dirname(__DIR__)))->load();

$app = new Laravel\Lumen\Application(dirname(__DIR__));

$app->withFacades();
$app->withEloquent();

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

// TODO: Authentication
// $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
// ]);
//
// $app->register(App\Providers\AuthServiceProvider::class);

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    $router->get('/{book}/{chapter}/{verse}', 'BibleReferenceController@read');
});

return $app;
