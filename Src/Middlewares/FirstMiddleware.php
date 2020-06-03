<?php 
	namespace App\Middlewares;

	use App\Http\Request;
	use App\Http\Response;

	use App\Middlewares\Middleware;

	class FirstMiddleware implements Middleware{

		public function handle(Request $request,Response $response,\Closure $next): Response {
			
			$request->user = [
				'id' => 1,
				'nome' => 'jdc'
			];

			$response->autenticado = 0;


			return $next($request, $response);
		}
	}