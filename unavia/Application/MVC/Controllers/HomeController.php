<?php
namespace Application\MVC\Controllers;

use Application\MVC\Route;
use Application\MVC\Controllers\Controller;
use Application\MVC\Models\ContactSubmission;
use Application\Responses\MessageResponse;

require_once("/var/www/constants.php");
require_once(CONTROLLER_FUNCTIONS . "/func_contact.php");

class HomeController extends Controller {
	public function index() {
		//Get the index page
		require_once(VIEWS . "/Home/index.php");
		return;
	}

	//About page
	public function about() {
		//Send a contact submission email if the contact was submitted
		if ( isset($_REQUEST["submitContact"]) ) {
			$this->contact();
			return;
		}

		//If a ContactSubmission object exists in the request (validation errors), use it to fill in the information for the About page
		//	Otherwise, create a new ContactSubmission object for the About page
		$contactSubmission = $this->getRequestData("contactSubmission") ?? ContactSubmission::construct();

		//Get the about page
		require_once(VIEWS . "/Home/about.php");
		return;
	}

	public function contact() {
		//Get data from request
		$name		= $_POST["contactName"] ?? "";
		$email		= $_POST["contactEmail"] ?? "";
		$subject	= $_POST["contactSubject"] ?? "";
		$comments	= $_POST["contactComments"] ?? "";

		//Create contact submission
		$result = createContactSubmission($name, $email, $subject, $comments);
		$contactSubmission = $result->data;

		//Determine where to redirect based on operation status
		if ( $result->status == 0 ) {
			$message = new MessageResponse(0, "Message Created Successfully", "Message was created successfully");
		} else {
			$message = new MessageResponse(1, "Message Creation Failed", "Message was not created because of several errors");

			//Add contact submission to request data
			$this->setRequestData("contactSubmission", $contactSubmission);

			//Add validation errors to request data
			$this->setRequestData("validationErrors", $result->errors);
		}

		$this->setMessage($message);

		//Redirect to the necessary page
		Route::redirect("/About#contact");
		return;
	}

	//Error page
	public function error() {
		//Get the error page
		require_once(VIEWS . "/Home/error.php");
		return;
	}
}
