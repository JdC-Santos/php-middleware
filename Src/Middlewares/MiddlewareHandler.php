<?php 
	namespace App\Middlewares;

	class MiddlewareHandler {

		static public function call($middleware, $request, $response,\Closure $next){
			return call_user_func_array([new $middleware,'handle'],[$request, $response, $next]);
		}

		static public function executeMiddlewares(array $middlewares, &$request, &$response){
			
			foreach($middlewares as $middleware){
				$response = self::call($middleware, $request, $response, function($request, $response){
					return $response;
				});
			}
		}
	}