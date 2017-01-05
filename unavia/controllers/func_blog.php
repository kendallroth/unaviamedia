<?php
require_once("/var/www/constants.php");
require_once(UTILITIES);
require_once(MODELS . "/Post.php");

/**
 * @brief	Create a continent and validate it before adding to database
 * @param	$name	Continent name
 * @return	DatabaseResponse object with created continent
 */
/*function createContinent($name) {
	//Create and validate the continent
	$continent = new Continent("", $name);
	$result = $continent->validate();

	//Return the ValidationResult object
	if ( $result->status != 0 ) {
		return $result;
	}

	//Add the continent to the database
	return Continent::create($continent);
}*/

/**
 * @brief	Get a specific continent
 * @param	$id	Continent id to retrieve
 * @return	DatabaseResponse object with specified continent
 */
/*function readContinent($id) {
	//Get the specified continent
	return Continent::read($id);
}*/

/**
 * @brief	Get a list of all continents
 * @return	DatabaseResponse object with list of continents
 */
function readPosts() {
	//Get a list of all continents
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
