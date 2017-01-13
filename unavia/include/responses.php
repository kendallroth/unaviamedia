<?php
require_once("/var/www/constants.php");
require_once(UTILITIES);

/**
 * @brief	Base class for different response types that handles the status and response data
 */
class Response {
	public $responseType;
	public $status;
	public $message;
	public $data;

	function __construct($status, $message, $data = "") {
		$this->message = $message;
		$this->data = $data;

		//Handle invalid response status codes
		if ( isPositiveInt($status) ) {
			$this->status = $status;
		} else {
			//Set the response status as warning and override the response
			$this->status = 2;
			$this->message = "Invalid $this->responseType response status code specified";
		}
	}
}

/**
 * @brief	Class to handle miscellaneous messages
 */
class MessageResponse extends Response {

	function __construct($status, $message, $data = "") {
		$this->responseType = "Message";

		parent::__construct($status, $message, $data);
	}
}

/**
 * @brief	Class to handle routing response status
 */
class RouteResponse extends Response {

	function __construct($status, $message, $data = "") {
		$this->responseType = "Route";

		parent::__construct($status, $message, $data);
	}
}

/**
 * @brief	Class to handle validation response status
 */
class ValidationResponse extends Response {

	function __construct($status, $message, $data = "") {
		$this->responseType = "Validation";

		parent::__construct($status, $message, $data);
	}
}

/**
 * @brief	Class to handle database response status and data
 */
class DatabaseResponse extends Response {

	function __construct($status, $message, $data = "") {
		$this->responseType = "Database";

		parent::__construct($status, $message, $data);
	}
}
