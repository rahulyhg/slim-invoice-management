<?php

use Slim\Http\Request;
use Slim\Http\Response;
require '../services/product-services.php';
// Routes

$app->get('/products/',function (Request $request, Response $response, array $args) {
	$this->get('logger')->info("Slim-Skeleton '/' route");
	$result = readAllProducts($this->dbUtilObject);
	$response->getBody()->write($result);
	$this->dbUtilObject->closeConnection();
	return $response;
});

$app->get('/products/{product-id}/',function (Request $request, Response $response, array $args) {
	$this->get('logger')->info("Slim-Skeleton '/' route");
	$result = searchProduct($this->dbUtilObject,$args);
	$response->getBody()->write($result);
	$this->dbUtilObject->closeConnection();
	return $response;
});