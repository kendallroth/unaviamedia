<?php
namespace Application\MVC\Controllers;

use Application\MVC\Route;
use Application\MVC\Controllers\Controller;
use Application\MVC\Models\Post;
use Application\Responses\MessageResponse;

require_once("/var/www/constants.php");
require_once(CONTROLLER_FUNCTIONS . "/func_post.php");

class BlogController extends Controller {
	//Constructor
	function __construct($request) {
		parent::__construct($request);
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
		} else {
			$message = new MessageResponse(2, "No Post Found", "No post was found with this ID");
			$this->setMessage($message);

			//Redirect to the blog index page
			Route::redirect("/Blog");
			return;
		}

		require_once(VIEWS . "/Blog/read.php");
		return;
	}

	//Display the post create page
	public function create() {
		//Create a post if the form was submitted
		//TODO: Change to use POST or GET methods
		if ( isset($_REQUEST["submitPost"]) ) {
			$this->createPost();
			return;
		}

		//If a Post object exists in the request (validation errors), use it to fill in the information for the Create page
		//	Otherwise, create a new Post object for the Create page
		$post = $this->getRequestData("blogPost") ?? Post::construct();

		//Include the Create page
		require_once(VIEWS . "/Blog/create_update.php");
		return;
	}

	//Create the post
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
		$post = $result->data;

		//Add post to request data
		$this->setRequestData("blogPost", $post);

		//TODO: Create categories/flags association if post was successful

		//Determine where to redirect based on operation status
		if ( $result->status == 0 ) {
			$message = new MessageResponse(0, "Post Creation Successful", "Post was created successfully");
			$redirectURL = "/Blog/$post->id";
		} else {
			$message = new MessageResponse(1, "Post Creation Failed", "Post was not created because of several errors");
			$redirectURL = "/Blog/Create";

			//Add validation errors to request data
			$this->setRequestData("validationErrors", $result->errors);
		}

		$this->setMessage($message);

		//Redirect to the necessary page
		Route::redirect($redirectURL);
		return;
	}

	//Display the post update page
	public function edit() {
		//Create a post if the form was submitted
		if ( isset($_REQUEST["submitPost"]) ) {
			$this->editPost();
			return;
		}

		//If a Post object exists in the request (validation errors), use it to fill in the information for the Edit page
		//	Otherwise, retrieve the requested Post object for the Edit page
		if ( $this->hasRequestData("blogPost") ) {
			$post = $this->getRequestData("blogPost");
		} else {
			if ( $this->request->args ) {
				//Get the requested post for editing
				$postId = $this->request->args[0];
				$result = readPost($postId);

				//Display the post for editing if it was found successfully
				if ( $result->status == 0 ) {
					$post = $result->data;
				} else {
					//Create an error message and redirect to the Blog page
					$message = new MessageResponse(1, "Requested Post Not Found", "The Post you requested to edit does not exist");
					$this->setMessage($message);

					//Redirect to the blog home page
					Route::redirect("/Blog");
					return;
				}
			} else {
				//Create an error message and redirect to the Blog page
				$message = new MessageResponse(1, "No Post Specified", "No Post was chosen for editing");
				$this->setMessage($message);

				//Redirect to the blog home page
				Route::redirect("/Blog");
				return;
			}
		}

		//Include the Update page
		require_once(VIEWS . "/Blog/create_update.php");
		return;
	}

	//Update the post
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
		$post = $result->data;

		//Add post to request data
		$this->setRequestData("blogPost", $post);

		//TODO: Update categories/flags association if post was successful

		//Determine where to redirect based on operation status
		if ( $result->status == 0 ) {
			$message = new MessageResponse(0, "Post Update Successful", "Post was updated successfully");
			$redirectURL = "/Blog/$post->id";
		} else {
			$message = new MessageResponse(1, "Post Update Failed", "Post was not updated because of several errors");
			$redirectURL = "/Blog/Edit/$post->id";

			//Add validation errors to request data
			$this->setRequestData("validationErrors", $result->errors);
		}

		$this->setMessage($message);

		//Redirect to the necessary page
		Route::redirect($redirectURL);
		return;
	}

	//Display the post delete page
	public function delete() {
		//Create a post if the form was submitted
		if ( isset($_REQUEST["deletePost"]) ) {
			$this->deletePost();
			return;
		}

		if ( $this->request->args ) {
			//Get the requested post for editing
			$postId = $this->request->args[0];
			$result = readPost($postId);

			//Display the post for deletion if it was found successfully
			if ( $result->status == 0 ) {
				$post = $result->data;

				//Include the Delete page
				require_once(VIEWS . "/Blog/delete.php");
				return;
			} else {
				//Create an error message and redirect to the Blog page
				$message = new MessageResponse(1, "Requested Post Not Found", "The Post you requested to delete does not exist");
			}
		} else {
			//Create an error message and redirect to the Blog page
			$message = new MessageResponse(1, "No Post Specified", "No Post was chosen for deletion");
		}

		$this->setMessage($message);

		//Redirect to the blog home page
		Route::redirect("/Blog");
		return;
	}

	//Delete the post
	public function deletePost() {
		//Get post to delete from request
		$id = $_POST["id"] ?? "";

		//Delete post
		$result = deletePost($id);
		$post = $result->data;

		//Add deleted post to request data
		$this->setRequestData("blogPost", $post);

		//TODO: Remove/update categories/flags association if post deletion was successful

		//Determine where to redirect based on operation status
		if ( $result->status == 0 ) {
			$message = new MessageResponse(0, "Post Delete Successful", "Post was deleted successfully: $post->title");
			$redirectURL = "/Blog";
		} else {
			$message = new MessageResponse(1, "Post Delete Failed", "Post was not able to be deleted");
			$redirectURL = "/Blog/Delete/$post->id";
		}

		$this->setMessage($message);

		//Redirect to the necessary page
		Route::redirect($redirectURL);
		return;
	}
}
