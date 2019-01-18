<?php
    namespace App\Middlewares;

    use App\Middlewares\Middleware;

    use App\Http\Request;
    use App\Http\Response;

    class FirstMiddleware implements Middleware
    {
        public function handle(Request $request, Response $response, \Closure $next):Response
        {
            $request->user = [
                'id' => 1,
                'nome' => 'Lucas'
            ];

            $response->autenticado = 'nao';

            return $next($request, $response);
        }
    }