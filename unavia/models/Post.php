<?php
require_once("/var/www/constants.php");
require_once(UTILITIES);
require_once(DATABASE);

/**
 * @brief	Model class for Posts
 */
class Post {
	public $id;
	public $title;
	public $description;
	public $content;
	public $author;
	public $dateCreated;
	public $dateModified;
	public $published;

	function __construct($id, $title, $description, $content, $author, $dateCreated, $dateModified, $published) {
		$this->id = $id;
		$this->title = $title;
		$this->description = $description;
		$this->content = $content;
		$this->author = $author;
		$this->dateCreated = $dateCreated;
		$this->dateModified = $dateModified;
		$this->published = $published;
	}

	/**
	 * @brief	Validate the Post model
	 */
	public function validate() {
		$errors = array();

		//TODO: Validate the author
		if ( $this->author != "admin" ) {
			$errors[] = new ValidationError("author", "Post author must be a valid user allowed to post");
			return new ValidationResponse(1, "Post author is invalid", $errors);
		}

		//Validation
		if ( strlen($this->title) == 0 ) {
			$errors[] = new ValidationError("title", "Post title is required");
		}
		else if ( strlen($this->title) < 5 ) {
			$errors[] = new ValidationError("title", "Post title must be greater than 5 characters");
		}

		if ( strlen($this->description) == 0 ) {
			$errors[] = new ValidationError("description", "Post description is required");
		} else if ( strlen($this->description) < 5 ) {
			$errors[] = new ValidationError("description", "Post description must be greater than 5 characters");
		}

		if ( strlen($this->content) == 0 ) {
			$errors[] = new ValidationError("content", "Post content is required");
		} else if ( strlen($this->content) < 5 ) {
			$errors[] = new ValidationError("content", "Post content must be greater than 5 characters");
		}

		if ( strlen($this->author) == 0 ) {
			$errors[] = new ValidationError("author", "Post must have an author");
		}

		if ( date_create($this->dateModified) < date_create($this->dateCreated) ) {
			$errors[] = new ValidationError("dateModified", "Post modification date must be after the creation date");
		}

		//Any incorrect values show that a post has not been published
		if ( $this->published != 1 ) {
			$this->published = 0;
		}

		//Handle any validation errors
		if ( count($errors) > 0 ) {
			return new ValidationResponse(1, "Post is invalid", $errors);
		}

		//Return the validated continent
		return new ValidationResponse(0, "Post created ('{$this->title}')", $this);
	}


	///////////////////////////////////////////////////////////////////////////////
	//	Data Access Layer functionality
	///////////////////////////////////////////////////////////////////////////////

	/**
	 * @brief	Create a post record in the database
	 * @param	$post	Post record to create
	 * @return	DatabaseResponse object with created post
	 */
	public static function create($post) {
		$conn = DB::connect();
		$sql =
			"INSERT INTO posts ( title, description, content, author, date_created, date_modified, published )
			VALUES ( '{$post->title}', '{$post->description}', '{$post->content}', '{$post->author}', '{$post->dateCreated}', '{$post->dateModified}', {$post->published} );";

		//Handle query errors
		if ( $conn->query($sql) != true || $conn->affected_rows == 0) {
			return new DatabaseResponse(1, "Adding post failed ('{$post->title}')", $conn->error);
		}

		//Return database response with the created post
		return new DatabaseResponse(0, "Added post ('{$post->title}')", $post);
	}

	/**
	 * @brief	Read a post record from the database
	 * @param	$id	Post id to retrieve
	 * @return	DatabaseResponse object with specified post
	 */
	public static function read($id) {
		$conn = DB::connect();
		$sql =
			"SELECT id, title, description, content, author, date_created, date_modified, published
			FROM posts
			WHERE id=$id
			LIMIT 1;";

		//Handle query errors
		if ( !$result = $conn->query($sql) ) {
			return new DatabaseResponse(1, $conn->error);
		}

		//Handle empty result (warning)
		if ( $result->num_rows == 0 ) {
			return new DatabaseResponse(2, "No post with id='$id' found");
		}

		//Create the post object
		$row = $result->fetch_assoc();
		$post = new Post($row["id"], $row["title"], $row["description"], $row["content"],
			$row["author"], $row["date_created"], $row["date_modified"], $row["published"]);

		//Return database response with the post
		return new DatabaseResponse(0, "Post retrieved ({$post->title})", $post);
	}

	/**
	 * @brief	Read all post records from the database
	 * @return	DatabaseResponse object with list of posts
	 */
	public static function readAll() {
		$conn = DB::connect();
		$sql =
			"SELECT id, title, description, content, author, date_created, date_modified, published
			FROM posts
			ORDER BY id;";

		//Handle query errors
		if ( !$result = $conn->query($sql) ) {
			return new DatabaseResponse(1, $conn->error);
		}

		//Handle empty result (warning)
		if ( $result->num_rows == 0 ) {
			return new DatabaseResponse(2, "No posts found");
		}

		$posts = array();

		//Create an array of posts
		while ( $row = $result->fetch_assoc() ) {
			$post = new Post($row["id"], $row["title"], $row["description"], $row["content"], $row["author"], $row["date_created"], $row["date_modified"], $row["published"]);
			$posts[] = $post;
		}

		//Return database response with the array of posts
		return new DatabaseResponse(0, "All posts retrieved", $posts);
	}

	/**
	 * @brief	Update a post record in the database
	 * @param	$post	Post record to update
	 * @return	DatabaseResponse object with updated post
	 */
	public static function update($post) {
		$conn = DB::connect();
		$sql =
			"UPDATE posts
			SET title='{$post->title}', description='{$post->description}', content='{$post->content}', author='{$post->author}', date_created='{$post->dateCreated}', date_modified='{$post->dateModified}', published='{$post->published}'
			WHERE id='{$post->id}';";

		//Handle query errors
		if ( $conn->query($sql) != true || $conn->affected_rows == 0) {
			return new DatabaseResponse(1, "Updating post failed ('{$post->title}')", $conn->error);
		}

		//Return database reponse with updated post
		return new DatabaseResponse(0, "Post updated ('{$post->title}')", $post);
	}

	/**
	 * @brief	Delete a post record from the database
	 * @param	$id	Post id to delete
	 * @return	DatabaseResponse object with deleted post
	 */
	public static function delete($id) {
		$conn = DB::connect();
		$sql =
			"DELETE FROM posts
			WHERE id='$id';";

		//DEBUG: Get the post for debugging purposes
		$postResult = Post::read($id);
		$post = $postResult->data;

		//Handle trying to delete a non-existent post
		if ( $postResult->status != 0 ) {
			return new DatabaseResponse(1, "Post not found for deletion ('$id')");
		}

		//Handle query errors
		if ( $conn->query($sql) != true || $conn->affected_rows == 0 ) {
			return new DatabaseResponse(1, "Deleting post failed ('{$post->title}')", $conn->error);
		}

		//Return database response with deleted post
		return new DatabaseResponse(0, "Deleted post ('{$post->title}')", $post);
	}
}
