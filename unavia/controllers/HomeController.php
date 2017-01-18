<?php
require_once("/var/www/constants.php");

class HomeController extends Controller {
	public function index() {
		//Get the index page
		require_once(VIEWS . "/Home/index.php");
		return;
	}

	//About page
	public function about() {
		//Get the about page
		require_once(VIEWS . "/Home/about.php");
		return;
	}

	//Error page
	public function error() {
		//Get the error page
		require_once(VIEWS . "/Home/error.php");
		return;
	}
}
