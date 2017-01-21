<?php
namespace Application\Utilities;

require_once("/var/www/constants.php");

/**
 * @brief	Class to handle model validation errors
 */
class ValidationError {
	public $fieldName;
	public $message;

	function __construct($fieldName, $message) {
		$this->fieldName = $fieldName;
		$this->message = $message;
	}
}
