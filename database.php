<?php
require_once("/var/www/constants.php");

/**
 * @brief	Class for common database interactions
 */
class DB {
	/**
	 * @brief	Retrieve a database connection
	 * @return	Connection to the database
	 */
	static function connect() {
		//Create the connection to the database
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		//Display database connection errors
		if ( $conn->connect_error ) {
			//TODO: Come up with a better of displaying database errors
			die("ERROR: Connection Error -> " . $conn->connect_error);
		} else {
			//Set the database session timezone
			$sql = "SET time_zone = '-05:00';";
			$conn->query($sql);
		}

		return $conn;
	}
}

?>
