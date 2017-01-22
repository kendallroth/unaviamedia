<?php
namespace Application\MVC\Models;

use Application\MVC\Models\Model;
use Application\Responses\ValidationResponse;
use Application\Utilities\ValidationError;

require_once("/var/www/constants.php");

/**
 * Model for Contact form submissions
 */
class ContactSubmission extends Model {
	public $name;
	public $email;
	public $subject;
	public $comments;

	/**
	 * Constructor for ContactSubmission model
	 * @param string	$name		Contact name
	 * @param string	$email		Contact email address
	 * @param string	$subject	Subject of email
	 * @param string	$comment	Comments to send
	 */
	function __construct($name, $email, $subject, $comments) {
		$this->name = $name;
		$this->email = $email;
		$this->subject = $subject;
		$this->comments = $comments;
	}

	/**
	 * Empty constructor override
	 * @return ContactSubmission	Empty ContactSubmission model
	 */
	public static function construct() {
		$instance = new self("", "", "", "");
		return $instance;
	}

	/**
	 * Validate the model
	 * @return ValidationResponse	ValidationResult object indicating status of validation
	 */
	public function validate() {
		$errors = array();

		//Validation
		if ( strlen($this->name) == 0 ) {
			$errors[] = new ValidationError("name", "Name is required");
		}
		else if ( strlen($this->name) < 3 ) {
			$errors[] = new ValidationError("name", "Name must be longer than 3 characters");
		}

		if ( strlen($this->email) == 0 ) {
			$errors[] = new ValidationError("email", "Email address is required");
		} else if ( strlen($this->email) < 5 ) {
			$errors[] = new ValidationError("email", "Email address must be longer than 5 characters");
		}

		if ( strlen($this->subject) == 0 ) {
			$errors[] = new ValidationError("subject", "Subject is required");
		} else if ( strlen($this->subject) < 5 ) {
			$errors[] = new ValidationError("subject", "Subject must be longer than 5 characters");
		}

		if ( strlen($this->comments) == 0 ) {
			$errors[] = new ValidationError("comments", "Commments are required");
		} else if ( strlen($this->comments) < 5 ) {
			$errors[] = new ValidationError("comments", "Comments must be longer than 5 characters");
		}

		//Handle any validation errors
		if ( count($errors) > 0 ) {
			return new ValidationResponse(1, "Contact submission is invalid", $this, $errors);
		}

		//Return the validated continent
		return new ValidationResponse(0, "Contact submission created from ('{$this->name}')", $this);
	}

	/**
	 * Validate a ReCaptcha response
	 * @param  string	$reCaptchaResponse	ReCaptcha response string
	 * @return ValidationResponse	Response indicating whether ReCaptcha was valid
	 */
	public static function validateReCaptcha($reCaptchaResponse) {
		if ( isset($reCaptchaResponse) ) {
			//Send reCAPTCHA request
			$responseData = getReCAPTCHA($reCaptchaResponse);

			//Validate reCAPTCHA response
			if ( $responseData->success ) {
				return new ValidationResponse(0, "ReCAPTCHA verfication succeeded", "");
			} else {
				return new ValidationResponse(1, "ReCAPTCHA verfication failed", "");
			}
		} else {
			return new ValidationResponse(0, "ReCAPTCHA verfication is required", "");
		}
	}
}
