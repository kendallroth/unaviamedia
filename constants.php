<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

define("HTML_ROOT", "/var/www/unavia");

define("INCLUDES", HTML_ROOT . "/includes");

define("STYLES", "/dist/css");
define("SCRIPTS", "/dist/js");
define("IMAGES", "/dist/img");
define("ICONS", IMAGES . "/icons");

define("HEADER_FRAGMENT", INCLUDES . "/header.php");
define("FOOTER_FRAGMENT", INCLUDES . "/footer.php");


// Static Page Title
define("PAGE_TITLE", "&ensp;|&ensp;UnaviaMedia");


// Links
define("HOME_URL", "/index.php");


// Dynamic Page Title
$PAGE_TITLE = "";
