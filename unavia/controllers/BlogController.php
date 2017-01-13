<?php
require_once("/var/www/constants.php");
require_once(CONTROLLERS . "/func_post.php");

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

	//Display the post create page
	public function create() {
		//Create a post if the form was submitted
		if ( isset($_REQUEST["submitPost"]) ) {
			$this->createPost();
			return;
		}

		require_once(VIEWS . "/Blog/create.php");
		return;
	}

	//Create the post and display the appropriate page depending on the result
	public function createPost() {
		//Get data from request
		$title = $_POST["title"] ?? "";
		$description = $_POST["description"] ?? "";
		$author = $_POST["author"] ?? "";
		$content = $_POST["content"] ?? "";
		$published = $_POST["published"] ?? 0;

		//Create necessary metadata
		$dateCreated = date("Y-m-d H:i:s");
		$dateModified = $dateCreated;

		//Create post
		$result = createPost("", $title, $description, $content, $author, $dateCreated, $dateModified, $published);

		//TODO: Create categories/flags association if post was successful

		//Handle post create failures
		if ( $result->status == 0 ) {
			$post = $result->data;
			$this->request->args[0] = $post->id;
			$page = "read";
		} else {
			$page = "error";
		}

		//Display the newly created post
		require_once(VIEWS . "/Blog/{$page}.php");
		return;
	}

	//Display the post update page
	public function edit() {
		//Create a post if the form was submitted
		if ( isset($_REQUEST["submitPost"]) ) {
			$this->editPost();
			return;
		}

		$postId = null;

		//Get the id of the requested post to update
		if ( $this->request->args ) {
			$postId = $this->request->args[0];
		}

		//Get the requested post for editing
		$result = readPost($postId);

		//Handle requested posts that don't exist
		if ( $result->status == 0 ) {
			$post = $result->data;
			$page = "update";
		} else {
			$page = "error";
		}

		require_once(VIEWS . "/Blog/{$page}.php");
		return;
	}

	//Update the post and display the appropriate page depending on the result
	public function editPost() {
		//Get data from request
		$id = $_POST["id"] ?? "";
		$title = $_POST["title"] ?? "";
		$description = $_POST["description"] ?? "";
		$author = $_POST["author"] ?? "";
		$content = $_POST["content"] ?? "";
		$published = $_POST["published"] ?? 0;

		//Create necessary metadata
		$dateCreated = $_POST["date_created"] ?? "";
		$dateModified = date("Y-m-d H:i:s");

		//Update post
		$result = updatePost($id, $title, $description, $content, $author, $dateCreated, $dateModified, $published);

		//TODO: Update categories/flags association if post was successful

		//Handle post update failures
		if ( $result->status == 0 ) {
			$post = $result->data;
			$this->request->args[0] = $post->id;
			$page = "read";
		} else {
			$page = "error";
		}

		//Display the newly updated post
		require_once(VIEWS . "/Blog/{$page}.php");
		return;
	}
}
