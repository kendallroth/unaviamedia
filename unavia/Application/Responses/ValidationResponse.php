<?php
namespace Application\Responses;

use Application\Responses\Response;

require_once("/var/www/constants.php");

/**
 * @brief	Class to handle validation response status
 */
class ValidationResponse extends Response {
	public $errors;

	function __construct($status, $message, $data, $errors = "") {
		$this->responseType = "Validation";
		$this->errors = $errors;

		parent::__construct($status, $message, $data);
	}
}
