<?php 
use Slim\Http\Request;
use Slim\Http\Response;

function readAllProducts($connection) {
	//$connection = $this->getcontainer()->get('dbUtilObject');
	$resultSet = $connection->select("select * from product_table" , []);
	if(isset($resultSet)){
		$jsonData['status'] = "success";
		$jsonData['product'] = $resultSet;
	} else {
		$jsonData['status'] = "failure";
	}
	//$this->getcontainer()->get('dbUtilObject')->closeConnection();
	return json_encode($jsonData);
}

function searchProduct($connection, $args) {
	$bindParams = array();
	$bindParams['product_id'] = intval($args['product-id']);
	$resultSet = $connection->select("select * from product_table where product_id = :product_id",$bindParams);
	if (!isset($resultSet)) {
		$jsonData['status'] = "failure";
		$jsonData['reason'] = "no such product exists";
	} else if(isset($resultSet) && $resultSet != "fail" ) {
		$jsonData['status'] = "success";
		$jsonData['product'] = $resultSet;
	} else {
		$jsonData['status'] = "failure";
		$jsonData['reason'] = "unable to fetch product details";
	}
	//$this->getcontainer()->get('dbUtilObject')->closeConnection();
	return json_encode($jsonData);
}
?>