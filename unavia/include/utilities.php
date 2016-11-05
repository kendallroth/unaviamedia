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
