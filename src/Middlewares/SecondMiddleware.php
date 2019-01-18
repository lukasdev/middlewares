<?php
    namespace App\Middlewares;

    use App\Middlewares\Middleware;

    use App\Http\Request;
    use App\Http\Response;

    class SecondMiddleware implements Middleware
    {
        public function handle(Request $request, Response $response, \Closure $next):Response
        {
            if ($response->autenticado == 'sim') {
                $response->permitido = 'sim';
            } else {
                echo 'Erro, usuario nao autenticado';
                die;
            }

            return $next($request, $response);
        }
    }