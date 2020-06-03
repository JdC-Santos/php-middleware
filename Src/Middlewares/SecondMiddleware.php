<?php 
	namespace App\Middlewares;

	use App\Http\Request;
	use App\Http\Response;

	use App\Middlewares\Middleware;

	class SecondMiddleware implements Middleware{

		public function handle(Request $request,Response $response,\Closure $next): Response {

			if($response->autenticado){
				$response->permitido = 1;
			}else{
				echo "Erro: usuário nao autenticado";
				die;
			}

			return $next($request, $response);
		}
	}