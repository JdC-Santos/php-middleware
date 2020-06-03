<?php 
	namespace App;

	use App\Http\Request;
	use App\Http\Response;

	use App\Middlewares\MiddlewareHandler;

	class App{

		protected $request;
		protected $response;
		protected $middlewares = [
			\App\Middlewares\FirstMiddleware::class,
			\App\Middlewares\SecondMiddleware::class,
		];

		public function __construct(){
			$this->request 	= new Request();
			$this->response = new Response();
		}

		public function index(){

			//aqui fica o core.
			MiddlewareHandler::executeMiddlewares($this->middlewares, $this->request, $this->response);

			var_dump($this->request);
			var_dump($this->response);

			if($this->response->autenticado && $this->response->permitido){
				echo "core da aplicacao";	
			}
			
		}
	}