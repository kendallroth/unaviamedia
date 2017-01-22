<?php
namespace Application\Responses;

use Application\Responses\Response;

require_once("/var/www/constants.php");

/**
 * @brief	Class to handle mailing responses
 */
class MailResponse extends Response {

	/**
	 * Constructor for MailResponse model
	 * @param int		$status		Response status
	 * @param string	$message	Response message
	 * @param object	$data		Mail data
	 */
	function __construct($status, $message, $data = "") {
		$this->responseType = "Mail";

		parent::__construct($status, $message, $data);
	}
}
