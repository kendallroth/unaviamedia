<?php
use Application\MVC\Models\ContactSubmission;
use Application\Responses\MailResponse;
use Application\Utilities\ValidationError;

require_once("/var/www/constants.php");
require_once(AUTOLOADER);

/**
 * Create a contact submission and send it
 * @param  string	$name		Sender name
 * @param  string	$email		Sender return email address
 * @param  string	$subject	Contact subject
 * @param  string	$comments	Contact comments
 * @return ValidationResponse	Validation response containing status of operation
 */
function createContactSubmission($name, $email, $subject, $comments) {
	//Create and validate the submission
	$contactSubmission = new ContactSubmission($name, $email, $subject, $comments);
	$result = $contactSubmission->validate();

	//Validate the ReCaptcha
	$reCaptchaResult = ContactSubmission::validateReCaptcha($_POST['g-recaptcha-response']);

	//Add ReCaptcha failure to errors and update status
	if ( $reCaptchaResult->status != 0 ) {
		$result->errors[] = new ValidationError("recaptcha", $reCaptchaResult->message);
		$result->status = 1;
	}

	//Return the ValidationResponse object
	if ( $result->status != 0 ) {
		return $result;
	}

	//Send the email

	//Configure SMTP authentication
	$mail = new PHPMailer;
	//$mail->SMTPDebug = 3;
	$mail->isSMTP();
	$mail->Host = SMTP_HOST;
	$mail->SMTPAuth = true;
	$mail->Username = SMTP_USERNAME;
	$mail->Password = SMTP_PASSWORD;
	$mail->SMTPSecure = "tls";
	$mail->Port = SMTP_PORT;

	//Set email headers
	$mail->setFrom(MAIL_ADDRESS, "Contact Us Submission");
	$mail->addAddress(MAIL_ADDRESS, "Contact Us Submission");
	$mail->addReplyTo($email, $name);
	$mail->isHTML(true);

	//Set email content
	$mail->Subject = htmlspecialchars($subject);
	$mail->Body = htmlspecialchars($comments);
	$mail->AltBody = htmlspecialchars($comments);

	//Attempt to send the message and display the results to the user
	if ($mail->send() == false) {
		return new MailResponse(1, "Message could not be sent", $contactSubmission);
	} else {
		return new MailResponse(0, "Message sent successfully", $contactSubmission);
	}
}

?>
