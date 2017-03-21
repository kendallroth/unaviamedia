<?php
namespace Application\MVC\Controllers;

use Application\Responses\MessageResponse;

require_once("/var/www/constants.php");

abstract class Controller {
	//Request context associated with controller
	public $request;

	//Data associated with controller
	protected $requestData;

	//Optional temporary controller message (MessageResponse)
	protected $message;

	//Constructor
	function __construct($request) {
		$this->request = $request;

		//DEBUG: Display the current session
		//debug($_SESSION);

		//Get the passed request data
		if ( isset($_SESSION["data"]) ) {
			$this->requestData = $_SESSION["data"];
			unset($_SESSION["data"]);
		}

		//Set the controller message if one exists
		if ( isset($_SESSION["message"]) ) {
			$this->message = $_SESSION["message"];
			unset($_SESSION["message"]);
		}
	}

	//Set the controller message
	public function setMessage($message) {
		$_SESSION["message"] = $message;
	}

	//Get the request data
	public function getRequestData($key) {
		return $this->requestData[$key];
	}

	//Check if the request data has the specified key
	public function hasRequestData($key) {
		if ( isset($this->requestData) && array_key_exists($key, $this->requestData) ) {
			return true;
		}

		return false;
	}

	//Set a request data key/value pair
	public function setRequestData($key, $data) {
		//Add the request data to the existing array or create it if it doesn't exist
		if ( isset($_SESSION["data"]) ) {
			$_SESSION["data"][$key] = $data;
		} else {
			$_SESSION["data"] = array($key => $data);
		}
	}

	//Display the controller route message
	public function displayMessage($title = false, $closable = true) {
		$message = $this->message;

		//Only show message if it is a MessageResponse object
		if ( !$message instanceof MessageResponse ) {
			return;
		}

		//Handle message colouring
		switch($message->status) {
			case 1:
				$calloutClass = "error";
				break;
			case 2:
				$calloutClass = "warning";
				break;
			case 3:
				$calloutClass = "primary";
				break;
			case 0:
			default:
				$calloutClass = "success";
				break;
		}

		$titleHtml = "";
		$closableHtml = "";

		//Handle messages with titles
		if ( $title ) {
			$titleHtml = <<< HTML_TITLE
				<div class="callout__header">
					$message->title
				</div>
HTML_TITLE;
		}

		//Handle closable messages
		if ( $closable ) {
			$closableHtml = <<< HTML_CLOSE_BUTTON
				<button class="close-button" type="button" aria-label="Dismiss Message" data-close>
					<span aria-hidden="true">&times;</span>
				</button>
HTML_CLOSE_BUTTON;
		}

		echo <<< HTML
			<div class="content_message callout message--{$calloutClass}" data-closable>
				$titleHtml
				<div class="callout__body">
					$message->message
				</div>
				$closableHtml
			</div>
HTML;
	}
}
