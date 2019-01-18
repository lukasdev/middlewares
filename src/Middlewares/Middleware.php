<?php
    namespace App\Middlewares;

    use App\Http\Request;
    use App\Http\Response;

    interface Middleware
    {
        public function handle(Request $request, Response $response, \Closure $next):Response;
    }