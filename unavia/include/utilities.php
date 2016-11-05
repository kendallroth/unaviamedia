<?php

/**
 * @brief	Send and receive a ReCAPTCHA verification request
 * @param	string	$reCaptchaResponse		ReCAPTCHA value
 * @return	JSON	JSON array with result of verification
 */
function getReCAPTCHA($reCaptchaResponse) {
	$apiURL = 	sprintf("https://www.google.com/recaptcha/api/siteverify?secret=%s&response=%s", RECAPTCHA_SECRET, $reCaptchaResponse);
	$verifyReCAPTCHA = file_get_contents($apiURL);
	return json_decode($verifyReCAPTCHA);
}
