"use strict"

$(document).foundation();

$(document).ready(function() {

});

function initializeSummaryList(selector) {
	var summaryList = $(selector);
	var summaryItems = summaryList.find(" li.summary__item");

	//Hide the descriptions initially
	summaryList.find(".summary__description").hide();

	//Attach click event handlers to headers
	summaryItems.on("click", ".summary__header", summaryListClick);
}

function summaryListCollapse(summaryList) {
	summaryList.find(".summary__description").slideUp();
}

function summaryListClick() {
	var summaryItem = $(event.currentTarget);

	//NOTE: The summary list item must be the direct parent of the header and summary
	summaryItem.find(".summary__description").slideToggle();
}
