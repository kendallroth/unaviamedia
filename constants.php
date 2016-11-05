<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

//Require the custom constants file (not committed for security)
require_once("/var/www/custom_constants.php");

define("HTML_ROOT", "/var/www/html");

define("INCLUDES", HTML_ROOT . "/include");

define("STYLES", "/dist/css");
define("SCRIPTS", "/dist/js");
define("IMAGES", "/dist/images");
define("ICONS", "/dist/icons");

define("HEADER_FRAGMENT", INCLUDES . "/header.php");
define("FOOTER_FRAGMENT", INCLUDES . "/footer.php");


//Static Page Title
define("PAGE_TITLE", "&ensp;|&ensp;UnaviaMedia");
//Dynamic Page Title
$PAGE_TITLE = "";


//Links
define("HOME_URL", "/index.php");
define("ABOUT_URL", "/about.php");
