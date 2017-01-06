<?php
require_once("/var/www/constants.php");
require_once(UTILITIES);
require_once(MODELS . "/Post.php");

/**
 * @brief	Create a post and validate it before adding to database
 * @param	$name	Post name
 * @return	DatabaseResponse object with created post
 */
function createPost($id, $title, $description, $content, $author, $dateCreated, $dateModified, $published) {
	//Create and validate the post
	$post = new Post($id, $title, $description, $content, $author, $dateCreated, $dateModified, $published);
	$result = $post->validate();

	//Return the ValidationResult object
	if ( $result->status != 0 ) {
		return $result;
	}

	//Add the post to the database
	return Post::create($post);
}

/**
 * @brief	Get a specific post
 * @param	$id	Post id to retrieve
 * @return	DatabaseResponse object with specified post
 */
function readPost($id) {
	//Get the specified post
	return Post::read($id);
}

/**
 * @brief	Get a list of all posts
 * @return	DatabaseResponse object with list of posts
 */
function readPosts() {
	//Get a list of all posts
	return Post::readAll();
}

/**
 * @brief	Update a continent and validate it before updating database
 * @param	$id		Id of continent to update
 * @param	$name	Updated continent name
 * @return	DatabaseResponse object with updated continent
 */
/*function updateContinent($id, $name) {
	//Create and validate the updated continent
	$continent = new Continent($id, $name);
	$result = $continent->validate();

	//Return the ValidationResponse object
	if ( $result->status != 0 ) {
		//Update validation message
		$result->message = "Updated continent is not valid";
		return $result;
	}

	//Update the continent in the database
	return Continent::update($continent);
}*/

/**
 * @brief	Delete a continent
 * @param	$id	Id of continent to delete
 * @return	DatabaseResponse object with deleted continent
 */
/*function deleteContinent($id) {
	//Handle empty/invalid ids
	if ( !isPositiveInt($id) ) {
		return new ValidationResponse(1, "Valid ID is required for deletion");
	}

	//Delete the specified continent
	return Continent::delete($id);
}*/
