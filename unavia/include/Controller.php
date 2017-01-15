<?php
require_once("/var/www/constants.php");

abstract class Controller {
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

	//Display the controller route message
	public function displayMessage($closable = true) {
		$message = $this->message;

		//Only show message if it is a MessageResponse object
		if ( !is_a($message, "MessageResponse") ) {
			return;
		}
		
		//Handle message colouring
		switch($message->status) {
			case 1:
				$calloutClass = "alert";
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

		$closableHtml = "";

		//Handle closable messages
		if ( $closable ) {
			$closableHtml = <<<HTML_CLOSE_BUTTON
				<button class="close-button" type="button" aria-label="Dismiss Message" data-close>
					<span aria-hidden="true">&times;</span>
				</button>
HTML_CLOSE_BUTTON;
		}

		echo <<< HTML
			<div class="content_message callout warning" data-closable>
				<div class="callout__header">
					$message->title
				</div>
				<div class="callout__body">
					$message->message
				</div>
			</div>
HTML;
	}
}
