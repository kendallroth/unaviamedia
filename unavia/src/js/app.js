$(document).foundation();

/**
 * Extend the String object to allow for placeholder/value strings
 */
if (!String.format) {
	String.format = function(formatString) {
		//Get the function arguments (placeholder values)
		var placeholderValues = Array.prototype.slice.call(arguments, 1);

		//If there are no arguments, return the unchanged string
		if (!placeholderValues.length) {
			return formatString;
		}

		//Get the type of the first placeholder value (will determine if numbered or named placeholders (string or Object))
		var valueType = typeof placeholderValues[0];

		//If placeholder values are strings/numbers, if will keep the array of strings (values)
		//	Otherwise (ie. object), it will only keep the first placeholder value (as only one object is used (w/ multiple properties))
		placeholderValues = ((valueType == "string" || valueType == "number") ? placeholderValues : placeholderValues[0]);

		//Replace each placeholder with the corresponding value (loop either over array or object properties, depending on type)
		for (var arg in placeholderValues) {
			formatString = formatString.replace(RegExp("\\{" + arg + "\\}", "gi"), placeholderValues[arg]);
		}

		//Return the formatted string
		return formatString;
	};
}


/**
 * @brief	Remove the specified message
 */
function messageAlertDelete(messageId) {
	$("#" + messageId).remove();
}

/**
 * @brief	Create a timer for a message
 * @param  {[type]} messageId [description]
 * @param  {[type]} timeout   [description]
 */
function createMessageTimer(messageId, timeout, svg_size) {
	var svg_center = svg_size / 2;
	var border_width = 2;
	var circle_diameter = svg_size - border_width;
	var circle_radius = circle_diameter / 2;
	var circle_circumference = circle_diameter * Math.PI;

	//Lower and upper x/y bounds for the close button "x"
	var x_lower = svg_size * 0.35;
	var x_upper = svg_size * 0.65;

	//width:			Width of svg
	//height:			Height of svg
	//r:				Radius of circle (not counting border)
	//cx:				X-coordinate of circle center in relation to svg
	//cy:				Y-coordinate of circle center in relation to svg
	//stroke-width:		Width of border stroke (half inside, half outside)
	var messageHTML = String.format(
		"	<svg class='message__timer' width='{0}' height='{0}' css='display: none;'><g>" +
		"		<circle class='timer__circle-animation' r='{1}' cx='{2}' cy='{2}' stroke-width='{3}' style='stroke-dasharray: {4}; stroke-dashoffset: {4};' />" +
    	"   	<line x1='{5}' x2='{6}' y1='{5}' y2='{6}' stroke-width='{3}' />" +
    	"   	<line x1='{5}' x2='{6}' y1='{6}' y2='{5}' stroke-width='{3}' />" +
		"	</g></svg>",
		svg_size, circle_radius, svg_center, border_width, circle_circumference, x_lower, x_upper);

	$("#" + messageId).append($(messageHTML)).ready(function() {
		messageAlertTimeout(messageId, timeout, circle_circumference);
	});
}

/**
 * @brief	Create a timeout for the message
 */
function messageAlertTimeout(messageId, timeout, circumference) {
	//Get timer element
	var timer = $("#" + messageId + " .timer__circle-animation");
	//Circumference of circle (used to track how much of the border is "hidden")
	var initialOffset = circumference;
	var i = 0;

	//Add the initial attributes for the animated border
	//timer.css("stroke-dasharray", initialOffset).css("stroke-dashoffset", initialOffset);
	$("#" + messageId + " svg").show();

	//Perform the first timer tick (as setInterval waits before running the first iteration);
	timer.css("stroke-dashoffset", initialOffset - (1 * (initialOffset / timeout)));

	var interval = setInterval(function() {
		//If the timeout has reached its length, remove the message
		if (++i >= timeout) {
			clearInterval(interval);
			messageAlertDelete(messageId);
			return;
		}

		//Perform a timer update (CSS handles animation)
		timer.css("stroke-dashoffset", initialOffset - ((i + 1) * (initialOffset / timeout)));
	}, 1000);
}
