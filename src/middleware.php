<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$app->add(function ($request, $response ,$next){
	$response->getBody()->write('<br>before middleware1<br>');
	$response = $next($request , $response);
	$response->getBody()->write('<br>after middleware1');
	return $response;
});

$app->add(function ($request, $response ,$next){
	$response->getBody()->write('<br>before middleware2');
	$response = $next($request , $response);
	$response->getBody()->write('<br>after middleware2');
	return $response;
});
