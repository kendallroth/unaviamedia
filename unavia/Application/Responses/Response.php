<?php
namespace Application\Responses;

require_once("/var/www/constants.php");

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
