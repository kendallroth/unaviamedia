<?php
require_once("/var/www/constants.php");

//DEBUG: Server Request URI
//print_r($_SERVER["REQUEST_URI"]);

//Require commonly required files
require_once(ROUTES);
require_once(RESPONSE_CLASSES);
require_once(UTILITIES);
require_once(CONTROLLER);

//TODO: This should be removed
require_once(MODELS . "/Post.php");

try {
	//TODO: Possibly move this into the Routes file
	//Start the session
	session_start();

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
