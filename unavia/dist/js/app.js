$(document).foundation();

/* Show transparent overlay */
function pageOverlay()
{
	$("#overlay").height($(window).height());
	$("#overlay").width($(window).width());
	$("#overlay").show();
}


/**
 * Scroll to the specified element
 * @param  string element ID of element to scroll
 */
function scrollTo(element)
{
	var tag = $("#" + element + "");
	$('html, body').animate({scrollTop: tag.offset().top}, '500');
	return false;
}

/**
 * Scroll to the top of the page
 */
function scrollTop()
{
	$('html, body').animate({scrollTop: 0}, '500');
	return false;
}

/**
 * Initialize event handling
 */
function init()
{
	// alert($('.page-top-button').attr('class'));
	$('.page-top-button').on('click', scrollTop);
}


$(document).ready(function(){
	init();
});
