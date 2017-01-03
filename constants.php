<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

//Require the custom constants file (not committed for security)
require_once("/var/www/custom_constants.php");

//PHP Paths
define("HTML_ROOT",			"/var/www/html");
define("INCLUDES",			HTML_ROOT . "/include");

//Common utilities
define("UTILITIES",			INCLUDES . "/utilities.php");
define("AUTOLOADER",		HTML_ROOT . "/vendor/autoload.php");
define("RESPONSE_CLASSES",	INCLUDES . "/responses.php");

//HTML Paths
define("STYLES",	"/dist/css");
define("SCRIPTS",	"/dist/js");
define("IMAGES",	"/dist/images");
define("ICONS",		"/dist/icons");

//Common fragments
define("FRAGMENT_HEADER",	INCLUDES . "/header.php");
define("FRAGMENT_FOOTER",	INCLUDES . "/footer.php");

//MVC Constants
define("ROUTES",		INCLUDES . "/routes.php");
define("CONTROLLERS",	HTML_ROOT . "/controllers");
define("MODELS",		HTML_ROOT . "/models");
define("VIEWS",			HTML_ROOT . "/views");

//Static Page Title
define("PAGE_TITLE",	"&ensp;|&ensp;UnaviaMedia");
//Dynamic Page Title
$PAGE_TITLE = "";


//Common links
define("URL_HOME",	"/");
define("URL_ABOUT",	"/About");
