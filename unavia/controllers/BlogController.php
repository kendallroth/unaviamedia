<?php
require_once("/var/www/constants.php");
require_once(CONTROLLERS . "/func_blog.php");

class BlogController {
	public function index() {
		//Perform index actions
		$result = readPosts();

		$posts = $result->data;

		//Get the index page
		require_once(VIEWS . "/Blog/index.php");
	}
}
