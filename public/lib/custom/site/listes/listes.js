$(document).ready(function()
{
	$('.listes li .panel').on('click', function ()
	{
		var liste = $(this);
		$('#modal-liste-update-id').val(liste.find('.liste-id').text());
		$('#modal-liste-update-nom').val(liste.find('.panel-title').text());
		$('#modal-liste-update-description').val(liste.find('.liste-description').text());
	});
	
});