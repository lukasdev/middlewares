<?php
    namespace App;
    use App\Middlewares\MiddlewaresHandler;

    use App\Http\Request;
    use App\Http\Response;

    class App
    {
        protected $request;
        protected $response;
        protected $middlewares = [
            \App\Middlewares\FirstMiddleware::class,
            \App\Middlewares\SecondMiddleware::class
        ];

        public function __construct()
        {
            $this->request = new Request();
            $this->response = new Response();
        }

        public function index()
        {
            //aqui vai ficar o Core
            MiddlewaresHandler::executeMiddlewares($this->middlewares, $this->request, $this->response);
            echo '<pre>';
            var_dump($this->request);
            var_dump($this->response);

            if ($this->response->autenticado == 'sim' && $this->response->permitido == 'sim') { 
                echo 'Core da aplicação';
            }
        }
    }