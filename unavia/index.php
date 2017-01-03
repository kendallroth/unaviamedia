<?php
require_once("/var/www/constants.php");

//DEBUG: Server Request URI
//print_r($_SERVER["REQUEST_URI"]);

require_once(ROUTES);

try {
	//Get the request
	$request = isset($_REQUEST["request"]) ? $_REQUEST["request"] : "";

	//Create a new route and call it
	$route = new Route($request);
	$route->processRoute();
} catch(Exception $e) {
	//TODO: Add exception handling
	header("Location: /Home/error.php", true, 500);
	die();
}
