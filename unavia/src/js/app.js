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
