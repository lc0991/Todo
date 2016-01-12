$(document).ready(function()
{
	$('input:not(:checkbox):not(:button):not(:submit),textarea').maxlength({
		alwaysShow: true,
		warningClass: "label label-default",
		limitReachedClass: "label label-warning",
		separator: ' / '
	});
});