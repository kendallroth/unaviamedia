<?php

/**
 * @brief	Test whether a variable is empty/unset/null
 * @param	$input	Variable to check
 * @return	Boolean indicating whether variable is empty
 */
function isEmpty($input) {
	$var = $input;

    if (is_null($var)) {
        return true;
    } else if (is_array($var) || is_object($var)) {
		return empty($var);
    } else if (is_bool($var)) {
        return false;
    } else {
        $var = trim($var);
        return (empty($var) && strcmp($var, "0"));
    }

    //Failsafe (although may give incorrect results if an edge case wasn't handled above)
    return empty($var);
}


/**
 * Class for displaying messages to the user
 */
class Message {
	public $id;
	public $message;
	public $type;
	public $hasIcon;

	public $isClosable;
	public $timeout;
	public $timerSize;
	public $placement;

	/**
	 * Create a new Message
	 * @param	$id      Id of the message
	 * @param	$message Message text to display
	 * @param	$type    Type of message
	 */
	public function __construct ($id, $message, $type) {
		$this->id = $id;
		$this->message = $message;
		$this->type = $type;
		$this->hasIcon = true;

		$this->isClosable = true;
		$this->timeout = 0;
		$this->timerSize = 26;
		$this->placement = "window";
	}

	/**
	 * Create the message HTML (consumed elsewhere)
	 *
	 * @return	HTML for the message
	 */
	public function create() {
		$messageClass = "";
		$icon = "";
		$iconHTML = "";
		$closeHTML = "";
		$timerScript = "";

		//Message type determines the message styles and icon
		switch($this->type) {
			case "success": {
				$messageClass = "message--success";
				$icon = "fi-check";
				break;
			}
			case "error": {
				$messageClass = "message--error";
				$icon = "fi-x";
				break;
			}
			case "warn": {
				$messageClass = "message--warn";
				$icon = "fi-flag";
				break;
			}
			default: {
				$messageClass = "message--info";
				$icon = "fi-info";
				break;
			}
		}

		//Allow message to be deleted if enabled, with the option to automatically close after a timeout period
		if ($this->isClosable) {
			$closeHTML = "<svg class='close' data-close width='20' height='20'><g><line x1='7' x2='13' y1='7' y2='13' stroke-width='2'></line><line x1='7' x2='13' y1='13' y2='7' stroke-width='2'></line></g></svg>";

			if ($this->timeout > 0) {
				$timerScript = createMessageTimer();
			}
		}

		//TODO: Add placement options
		//Messages can be placed in a fixed position at the top of the window or inside the DOM
		switch($this->placement) {
			case "dom": {
				break;
			}
			case "window":
			default:  {
				break;
			}
		}

		//Display icon if enabled
		if ($this->hasIcon == true) {
			$iconHTML = "<i class='{$icon}'></i>";
		}

		return "<div id='{$this->id}' data-closable class='message {$messageClass} text-center'>{$iconHTML}{$this->message}{$closeHTML}</div>{$timerScript}";
	}

	/**
	 * Create a JS script that will create the animated timer for the message
	 *
	 * @return	Script to create animated timer
	 */
	private function createMessageTimer() {
		return "<script>
			console.log('createMessageTimer({$this->id}, {$this->timeout}, {$this->timerSize})');
			createMessageTimer({$this->id}, {$this->timeout}, {$this->timerSize});
		</script>";
	}
}

/**
 * @brief	Create the HTML to display a form submission message
 *
 * @param	$message		Message to display
 * @param	$messageType	Type of message *
 * @return	Form submission message HTML
 */
function createFormMessage($message, $messageType, $closable = true) {
	die("Deprecated in favour of `Message` class");
	/*$messageClass = "";
	$messageIcon = "";

	switch($messageType) {
		case "success": {
			$messageClass = "message--success";
			$messageIcon = "fi-check";
			break;
		}
		case "error":
		default: {
			$messageClass = "message--error";
			$messageIcon = "fi-x";
			break;
		}
	}

	//Return the form submission message HTML
	return "<div class='message message--submission $messageClass text-center'><i class='$messageIcon'></i>$message</div>";*/
}


/**
 * @brief	Send and receive a ReCAPTCHA verification request
 *
 * @param	$reCaptchaResponse		ReCAPTCHA value
 * @return	JSON array with result of verification
 */
function getReCAPTCHA($reCaptchaResponse) {
	$apiURL = 	sprintf("https://www.google.com/recaptcha/api/siteverify?secret=%s&response=%s", RECAPTCHA_SECRET, $reCaptchaResponse);
	$verifyReCAPTCHA = file_get_contents($apiURL);
	return json_decode($verifyReCAPTCHA);
}
