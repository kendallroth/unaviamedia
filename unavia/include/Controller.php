<?php
require_once("/var/www/constants.php");

class Controller {
	//Request context associated with controller
	public $request;

	//Optional temporary controller message (MessageResponse)
	protected $message;

	//Constructor
	function __construct($request) {
		$this->request = $request;
	}

	//Set the request message
	public function setMessage($message) {
		$this->message = $message;
	}

	//Get the request message and reset it
	public function getMessage() {
		//Get the current message and reset the variable
		$message = $this->message;
		$this->message = null;

		return $message;
	}
}
