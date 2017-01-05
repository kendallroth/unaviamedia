<?php
require_once("/var/www/constants.php");
require_once(RESPONSE_CLASSES);

class Route {
	public static $VALID_ROUTES = array(
		"home" => array("index", "about", "error"),
		"blog" => array("index")
	);

	//The HTTP method this request was made in, either GET, POST, PUT or DELETE
	//protected $method = "";
	//The Model requested in the URI. eg: /files
	public $controller = "";
	//An optional additional descriptor about the controller, used for things that can not be handled by the basic methods.
	//	eg: /files/process
	public $action = "";
	//Any additional URI components after the controller and action have been removed, in our case, an integer ID for the resource.
	//	eg: /<controller>/<action>/<arg0>/<arg1> or /<controller>/<arg0>
	public $args = Array();

	function __construct($request) {
		//Get the request arguments (remove leading/trailing slashes first to avoid empty array elements)
		$this->args = explode('/', trim($request, '/'));
		//Get the controller from the request
		$this->controller = strtolower(array_shift($this->args));
		//Get the requested controller action if one exists
		//TODO: Possibly set action equal to controller if no action is specified???
		if ( array_key_exists(0, $this->args) && !is_numeric($this->args[0]) ) {
			$this->action = strtolower(array_shift($this->args));
		}
	}

	//Determine whether requested controller exists
	public static function controllerExists($controller) {
		//Check if the requested controller exists
		//TODO: Add more error handling
		if ( array_key_exists($controller, self::$VALID_ROUTES) ) {
			//DEBUG: Display whether controller exists
			//echo "DEBUG: Controller $controller does exist<br />";
			return true;
		}
		//DEBUG: Display whether controller exists
		//echo "DEBUG: Controller $controller does not exist<br />";
		return false;
	}

	//Determine whether specified controller contains specified action
	public static function controllerActionExists($controller, $action) {
		//Check if the requested action exists in the requested controller
		//TODO: Add more error handling
		if ( self::controllerExists($controller) && in_array($action, self::$VALID_ROUTES[$controller]) ) {
			//DEBUG: Display whether controller and action exist
			//echo "DEBUG: Action $action does exist in controller $controller<br />";
			return true;
		}

		//DEBUG: Display whether controller and action exist
		//echo "DEBUG: Action $action does not exists in controller $controller<br />";
		return false;
	}

	//Validate a route and return a response with the controller and action
	public function validate() {
		//Return the default controller/action if no controller (and consequently no action) was specified
		if ( $this->controller == "" ) {
			return new RouteResponse(0, "Using controller 'home' and action 'index'", array("controller" => "home", "action" => "index"));
		}

		//Verify that the requested controller exists
		//	If not, it could be that an action was requested from the default controller ("/About" looks nicer than "/Home/About")
		if ( Route::controllerExists($this->controller) ) {
			//If no controller action was specified check for and return the controller index action
			if ( $this->action == "" ) {
				//Return the controller index action if it exists
				if ( Route::controllerActionExists($this->controller, "index") ) {
					return new RouteResponse(0, "Using controller '{$this->controller}' for action 'index'", array("controller" => $this->controller, "action" => "index"));
				}

				//Return an error if there is no index page for the controller and action was empty
				return new RouteResponse(1, "No action 'index' in controller '{$this->controller}'", array("controller" => "home", "action" => "error"));
			}

			//Return controller and action if they exist (typical path)
			if ( Route::controllerActionExists($this->controller, $this->action) ) {
				return new RouteResponse(0, "Using controller '{$this->controller}' for action '{$this->action}'", array("controller" => $this->controller, "action" => $this->action));
			}

			//Return an error if an invalid action was requested but the controller exists
			return new RouteResponse(1, "No action '{$this->action}' in controller '{$this->controller}'", array("controller" => "home", "action" => "error"));
		}
		//Return default controller if action exists there and controller wasn't specified ("/About" vs "/Home/About")
		else if ( Route::controllerActionExists("home", $this->controller) && $this->action == "" ) {
			return new RouteResponse(0, "Using controller 'home' for action '{$this->controller}'", array("controller" => "home", "action" => $this->controller));
		}
		//Return an error if the requested controller does not exist
		else {
			return new RouteResponse(1, "No controller '{$this->controller}'", array("controller" => "home", "action" => "error"));
		}
	}

	//Perform the route actions
	public function processRoute() {
		//DEBUG: Display controller and action
		//echo "<pre>C => $this->controller\nA => $this->action\n</pre>";
		$result = $this->validate($this->controller, $this->action);

		//Get controller and action after validation
		$this->controller = $result->data["controller"];
		$this->action = $result->data["action"];

		//Set the HTTP response code to 404 if the page is not found
		//TODO: Find if this will conflict with 505 and other errors
		if ( $this->controller == "home" && $this->action == "error" ) {
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		}

		//TODO: Handle routing validation with $result->status

		//Require the matching controller file
		require_once(CONTROLLERS . "/" . ucfirst($this->controller) . "Controller.php");

		//Create the necessary controller
		switch($this->controller) {
			case "home":
				$this->controller = new HomeController();
				break;
			case "blog":
				$this->controller = new BlogController($this);
				break;
			default:
				break;
		}

		//Call the specified action (function in controller class)
		$this->controller->{$this->action}();
	}
}
