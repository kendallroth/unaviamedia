<?php
namespace Application\Responses;

use Application\Responses\Response;

require_once("/var/www/constants.php");

/**
 * @brief	Class to handle miscellaneous messages
 */
class MessageResponse extends Response {
	public $title;

	function __construct($status, $title, $message, $data = "") {
		$this->title = $title;
		$this->responseType = "Message";

		parent::__construct($status, $message, $data);
	}
}
