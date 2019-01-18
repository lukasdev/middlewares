<?php
    namespace App\Middlewares;

    class MiddlewaresHandler
    {
        public static function call($middleware, $request, $response, \Closure $next)
        {
            return call_user_func_array([new $middleware, 'handle'], [$request, $response, $next]);
        }

        public static function executeMiddlewares(array $middlewares, &$request, &$response)
        {
            foreach ($middlewares as $middleware) {
                $response = self::call($middleware, $request, $response, function($request, $response){
                    return $response;
                });
            }
        }
    }