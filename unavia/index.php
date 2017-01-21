<?php
namespace Application;

use Application\MVC\Route;

require_once("/var/www/constants.php");

/**
 * Create and register namespace-based class autoloader
 * @var $className	Class name to include
 */
spl_autoload_register( function($className) {
	$ds = DIRECTORY_SEPARATOR;
	$dir = __DIR__;

	//Replace namespace separator with directory separator
	$className = str_replace("\\", $ds, $className);

	//Get full name of file containing required class
	$file = "{$dir}{$ds}{$className}.php";

	//DEBUG
	//echo "$file<br />";

	//Include file
	if ( is_readable($file) ) {
		require_once($file);
	}
});

//DEBUG: Server Request URI
//print_r($_SERVER["REQUEST_URI"]);

//Require commonly required files
require_once(UTILITIES);
require_once("/var/www/html/Application/Responses/MessageResponse.php");

try {
	//TODO: Possibly move this into the Routes file
	//Start the session
	session_start();

	//Get the request
	$request = isset($_REQUEST["request"]) ? $_REQUEST["request"] : "";

	//Create a new route and call it
	$route = new Route($request);
	$route->processRoute();

	//Make sure nothing can continue
	die();
} catch(Exception $e) {
	//TODO: Add exception handling
	header("Location: /Home/error.php", true, 500);
	die();
}
