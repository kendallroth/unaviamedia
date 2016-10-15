<?php

require_once(HTML_ROOT . "/vendor/autoload.php");

$contactName = "";
$contactEmail = "";
$contactSubject = "";
$contactComments = "";
$mailMessageHTML = "";

//Handle form submission
if (isset($_POST["contactSubmit"])) {
	$emailFrom = MAIL_ADDRESS;
	$emailTo = MAIL_ADDRESS;

	//Capture form input
	$contactName = trim($_POST['contactName']);
	$contactEmail = trim($_POST['contactEmail']);
	$contactSubject = trim($_POST['contactSubject']);
	$contactComments = trim($_POST['contactComments']);

	//Validation variables
	$validation = true;
	$mailMessage = "";
	$mailMessageType = "error";

	//If anything is invalid, create an error message and set the validation flag
	if (strlen($contactName) < 2 || strlen($contactName) > 50) {
		$validation = false;
		$errName = "Name is required";
	}
	if (strlen($contactEmail) < 2 || strlen($contactEmail) > 75 || filter_var($contactEmail, FILTER_SANITIZE_EMAIL) == false) {
		$validation = false;
		$errEmail = "Email is required";
	}
	if (strlen($contactSubject) < 2 || strlen($contactSubject) > 100) {
		$validation = false;
		$errSubject = "Subject is required";
	}
	if (strlen($contactComments) < 10 || strlen($contactComments) > 500) {
		$validation = false;
		$errComments = "Comments are required";
	}

	//Compose and send the email if there are no validation errors
	if ($validation == true) {
		$mail = new PHPMailer;

		//Configure SMTP
		$mail->SMTPDebug = 3;
		$mail->isSMTP();
		$mail->Host = SMTP_HOST;
		$mail->SMTPAuth = true;
		$mail->Username = SMTP_USERNAME;
		$mail->Password = SMTP_PASSWORD;
		$mail->SMTPSecure = "ssl";
		$mail->Port = SMTP_PORT;

		//Set email headers
		$mail->setFrom($emailFrom);
		$mail->addAddress($emailTo, "Contact Us Submission");
		$mail->addReplyTo($contactEmail, $contactName);
		$mail->isHTML(true);

		//Set email content
		$mail->Subject = htmlspecialchars($contactSubject);
		$mail->Body = htmlspecialchars($contactComments);
		$mail->AltBody = htmlspecialchars($contactComments);

		//Attempt to send the message and display the results to the user
		if ($mail->send() == false) {
			//Error message
			$mailMessage = "Message could not be sent.";
		} else {
			//Success message
			$mailMessage = "Thanks! Your message has been sent!";
			$mailMessageType = "success";
		}
	} else {
		//Display the validation errors
		$mailMessage = "Form contains validation errors.";
	}

	//Create the form message bar to indicate status of form submission
	$mailMessageHTML = createFormMessage($mailMessage, $mailMessageType);
}

/**
 * @brief	Create the HTML to display the form submission message
 *
 * @param	$message		Message to display
 * @param	$messageType	Type of message *
 * @return	Form submission message HTML
 */
function createFormMessage($message, $messageType) {
	$messageClass = "";

	//$messageClass = strcmp($messageType, "success") == 0 ? "form-success" : "form-error";
	switch($messageType) {
		case "success": {
			$messageClass = "submission-success";
		}
		case "error":
		default: {
			$messageClass = "submission-error";
		}
	}

	//Return the form submission message HTML
	return "<div class='submission-message $messageClass text-center'><i class='fi-check'></i>$message</div>";
}

?>
