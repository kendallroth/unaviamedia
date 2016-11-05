<?php

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

/**
 * @brief	Create the HTML to display a form submission message
 *
 * @param	$message		Message to display
 * @param	$messageType	Type of message *
 * @return	Form submission message HTML
 */
function createFormMessage($message, $messageType) {
	$messageClass = "";
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
	return "<div class='message message--submission $messageClass text-center'><i class='$messageIcon'></i>$message</div>";
}
