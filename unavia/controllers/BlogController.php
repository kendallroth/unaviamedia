<?php
require_once("/var/www/constants.php");
require_once(CONTROLLERS . "/func_blog.php");

class BlogController {
	public $request;

	function __construct($request) {
		$this->request = $request;
	}

	//Display a listing of posts
	public function index() {
		//Display the blog listing page if no specific post was requested
		if ( $this->request->args ) {
			$this->read($this->request->args[0]);
			return;
		}

		//TODO: Handle database errors (status != 0)
		$result = readPosts();
		$posts = $result->data;

		require_once(VIEWS . "/Blog/index.php");
		return;
	}

	//Display a specific post
	public function read($id) {
		//Display the requested blog post
		$result = readPost($id);

		//Handle requested posts that don't exist
		if ( $result->status == 0 ) {
			$post = $result->data;
			$page = "read.php";
		} else {
			$page = "error.php";
		}

		//Require the correct page
		require_once(VIEWS . "/Blog/$page");
		return;
	}
}
