<?php
namespace Application\Responses;

use Application\Responses\Response;

require_once("/var/www/constants.php");

/**
 * @brief	Class to handle routing response status
 */
class RouteResponse extends Response {

	function __construct($status, $message, $data = "") {
		$this->responseType = "Route";

		parent::__construct($status, $message, $data);
	}
}
