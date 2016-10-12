<?php

require_once(HTML_ROOT . "/vendor/autoload.php");

$contactName = "";
$contactEmail = "";
$contactSubject = "";
$contactComments = "";
$mailMessageHTML = "";

//Handle form submission
if (isset($_POST["contactSubmit"])) {
	$emailFrom = "kroth@unaviamedia.ca";
	$emailTo = "kroth@unaviamedia.ca";

	//Capture form input
	$contactName = htmlspecialchars(trim($_POST['contactName']));
	$contactEmail = htmlspecialchars(trim($_POST['contactEmail']));
	$contactSubject = htmlspecialchars(trim($_POST['contactSubject']));
	$contactComments = htmlspecialchars(trim($_POST['contactComments']));

	//Validation variables
	$validation = true;
	$mailMessage = "";
	$mailMessageType = "";

	//Validation
	if (strlen($contactName) < 2 || strlen($contactName) > 50) {
		$validation = false;
		$errName = "Name is required";
	}
	if (strlen($contactEmail) < 2 || strlen($contactEmail) > 75) {
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

		$mail->setFrom($emailFrom);
		$mail->addAddress($emailTo, "Contact Us Submission");
		$mail->addReplyTo($email, $name);
		$mail->isHTML(true);

		$mail->Subject = $subject;
		$mail->Body = $comments;
		$mail->AltBody = $comments;

		if ($mail->send() == false) {
			//Error
			$mailMessage = "Message could not be sent.";
			$mailMessageType = "error";
		} else {
			//Success
			$mailMessage = "Thanks! Your message has been sent!";
			$mailMessageType = "success";
		}
	} else {
		$mailMessage = "Form contains validation errors.";
		$mailMessageType = "error";
	}

	//Create the form message bar to indicate status of form submission
	$mailMessageHTML = createFormMessage($mailMessage, $mailMessageType);
}

function createFormMessage($message, $messageType) {
	$messageClass = "";

	switch($messageType) {
		case "success": {
			$messageClass = "form-success";
		}
		case "error":
		default: {
			$messageClass = "form-success";
		}
	}

	return "<div class='form-message $messageClass text-center'><i class='fi-check'></i>$message</div>";
}

?>
