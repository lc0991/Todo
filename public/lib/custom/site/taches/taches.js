$(document).ready(function()
{
	$('.taches li .tache-modal').on('click', function ()
	{
		var tache = $(this);
		$('#modal-tache-update-id').val(tache.find('.tache-id').text());
		$('#modal-tache-update-nom').val(tache.find('.tache-nom').text());
		$('#modal-tache-update-priorite').val(tache.find('.tache-priorite').text());
		$('#modal-tache-update-etat').val(tache.find('.tache-etat').text());
		$('#modal-tache-update-echeance').val(tache.find('.tache-echeance').text());
	});
});