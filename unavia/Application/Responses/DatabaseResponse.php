<?php
namespace Application\Responses;

use Application\Responses\Response;

require_once("/var/www/constants.php");

/**
 * @brief	Class to handle database response status and data
 */
class DatabaseResponse extends Response {

	function __construct($status, $message, $data = "") {
		$this->responseType = "Database";

		parent::__construct($status, $message, $data);
	}
}
