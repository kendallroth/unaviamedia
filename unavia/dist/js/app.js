$(document).foundation();

$(document).ready(function(){
	init();
});

/**
 * Initialize event handling
 */
function init()
{
	$(".collapsible-menu").hide();
	$('.btn-page-top').on('click', scrollTop);
	$(".btn-menu").on("click", toggleMenu);
}


/* Show transparent overlay */
function pageOverlay()
{
	/*$("#overlay").height($(window).height());
	$("#overlay").width($(window).width());
	$("#overlay").show();*/
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
 * Toggle the menu
 */
function toggleMenu() {
	var btnMenu = $(".btn-menu").first();
	btnMenu.attr("data-menu-toggle", btnMenu.attr("data-menu-toggle") === "true" ? "false" : "true");
	$(".collapsible-menu").toggle();
}
