<?php
namespace Application\MVC\Models;

require_once("/var/www/constants.php");

/**
 * Model base class
 */
abstract class Model {
	/**
	 * Constructor to create a default Model (can't override constructors)
	 */
	public abstract static function construct();

	/**
	 * Validate the Post model
	 */
	public abstract function validate();
}
